<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB; 
class ArticleModel extends AdminModel
{
    public function __construct() {
        $this->table               = 'article';
        $this->folderUpload        = 'article' ; 
        $this->fieldSearchAccepted = ['name', 'content']; 
        $this->crudNotAccepted     = ['_token','thumb_current'];
    }
    public function listItems($params = null, $options = null) {
      
        $result = null;
        $this->table  = 'article as a';
        if($options['task'] == "admin-list-items") {
            $query = $this->select('a.id', 'a.name', 'a.status', 'a.category_id' , 'a.content', 'a.thumb', 'a.type', 'c.name as category_name' )
                          ->leftJoin('category as c', 'a.category_id', '=', 'c.id');


            if ($params['filter']['status'] !== "all")  {
                $query->where('a.status', '=', $params['filter']['status'] );
            }
        
            if ( $params['filter']['category'] !== "default" )  {
                $query->where('a.category_id', '=', $params['filter']['category'] );
            }
     
            if ($params['search']['value'] !== "")  {
                if($params['search']['field'] == "all") {
                    $query->where(function($query) use ($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->orWhere('a.' . $column, 'LIKE',  "%{$params['search']['value']}%" );
                        }
                    });
                } else if(in_array($params['search']['field'], $this->fieldSearchAccepted)) { 
                    $query->where('a.' . $params['search']['field'], 'LIKE',  "%{$params['search']['value']}%" );
                } 
            }
        
            $result =  $query->orderBy('a.id', 'desc')
                            ->paginate($params['pagination']['totalItemsPerPage']);

        }

        if($options['task'] == 'news-list-items') {
            $query = $this->select('id', 'name', 'thumb','content')
                        ->where('status', '=', 'active' )
                        ->limit(5);

            $result = $query->get()->toArray();
        }

        if($options['task'] == 'news-list-items-featured') {
 
            $query = $this->select('a.id', 'a.name', 'a.content', 'a.created', 'a.category_id', 'ca.name as category_article_name', 'a.thumb')
                ->leftJoin('category_article as ca', 'a.category_id', '=', 'ca.id')
                ->where('a.status', '=', 'active')
                ->where('a.type', 'featured')
                ->orderBy('a.id', 'desc')
                ->take(4);
               
            $result = $query->get()->toArray();
        }
        
        if($options['task'] == 'news-list-items-latest') {
            $dateCurrent = date('Y-m-d H:i:s');
            $query = $this->select('a.id', 'a.name', 'a.created', 'a.category_id', 'c.name as category_name', 'a.thumb')
                ->leftJoin('category as c', 'a.category_id', '=', 'c.id')
                ->where('a.status', '=', 'active')
                ->where('a.created', '<', $dateCurrent)
                ->orderBy('a.created', 'desc') 
                ->take(3);
            ;
            $result = $query->get()->toArray();
        }

        if($options['task'] == 'news-list-items-in-category') {
            $result = $this->select('a.id', 'a.name', 'a.content', 'a.thumb', 'a.created' , 'parent_id','a.created_by')
                ->leftJoin('category_article as c', 'a.category_id', '=', 'c.id')
                ->where('a.status', '=', 'active')
                ->where('a.category_id', '=', $params['category_id'])
            ;
            
            if($result) $result = $result->get()->toArray();
        }
        
        if($options['task'] == 'news-list-items-related-in-category') {
            $query = $this->select('id', 'name', 'content', 'thumb', 'created')
                ->where('status', '=', 'active')
                ->where('a.id', '!=', $params['article_id'])
                ->where('category_id', '=', $params['category_id'])
                ->take(4)
            ;
            $result = $query->get()->toArray();
        }
        
        if($options['task'] == 'news-list-items-new') {
            $query = $this->select('id', 'name', 'thumb', 'content', 'created', 'created_by')
                        ->where('status', '=', 'active' )
                        ->orderBy('id', 'desc')
                        ->limit(3);

            $result = $query->get()->toArray();
        }
        return $result;
    }

    public function countItems($params = null, $options  = null) {
     
        $result = null;

        if($options['task'] == 'admin-count-items-group-by-status') {
         
            $query = $this::groupBy('status')
                        ->select( DB::raw('status , COUNT(id) as count') );

            if ($params['search']['value'] !== "")  {
                if($params['search']['field'] == "all") {
                    $query->where(function($query) use ($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%" );
                        }
                    });
                } else if(in_array($params['search']['field'], $this->fieldSearchAccepted)) { 
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%" );
                } 
            }
            if ( $params['filter']['category'] !== "default" )  {
                $query->where('a.category_id', '=', $params['filter']['category'] );
            }

            $result = $query->get()->toArray();
        }

        return $result;
    }

    public function getItem($params = null, $options = null) { 
        $result = null;
        $this->table  = 'article as a';
        if($options['task'] == 'get-item') {
            $result = self::select('id', 'name', 'content', 'status', 'thumb', 'created','created_by' ,'category_id','title_seo','description_seo')->where('id', $params['id'])->first()->toArray();
        }

        if($options['task'] == 'get-thumb') {
            $result = self::select('id', 'thumb')->where('id', $params['article_id'])->first()->toArray();
        }

        if($options['task'] == 'news-get-item') {
            $result = self::select('a.id', 'a.name', 'content', 'a.created_by','a.category_id', 'c.name as category_name', 'a.thumb', 'a.created' , 'parent_id')
                         ->leftJoin('category_article as c', 'a.category_id', '=', 'c.id')
                         ->where('a.id', '=', $params['article_id'])
                         ->where('a.status', '=', 'active')->first();
            if($result) $result = $result->toArray();
        }

      

        return $result;
    }

    public function saveItem($params = null, $options = null) { 

        if($options['task'] == 'change-status') {
            $status = ($params['currentStatus'] == "active") ? "inactive" : "active";
            $class  = ($params['currentStatus'] == "active") ? "info"     : "success";
            self::where('id', $params['id'])->update(['status' => $status ]);
            return [ 
                        'name'     =>   config('zvn-notify.status.'.$status.''),
                        'class'    =>   config('zvn-notify.status.'.$class.'') ,
                        'link'     =>   route($this->table .'/status',['id' => $params['id'],'status' => $status,])   ,
                        'message'  =>   config('zvn-notify.status.message')  ,
                    ];
        }

        if($options['task'] == 'change-type') {
            self::where('id', $params['id'])->update(['type' => $params['currentType']]);
            return [ 'message' => config('zvn-notify.select.message')] ;
        }
        if($options['task'] == 'change-category') {
            self::where('id', $params['id'])->update(['category_id' => $params['currentCategory']]);
            return [ 'message' => config('zvn-notify.select.message')] ;
        }
        


        if($options['task'] == 'add-item') {
            $params['created_by'] = "truongdinh";
            $params['created']    = date('Y-m-d');
            $params['thumb']      = $this->uploadThumb($params['thumb']);
            self::insert($this->prepareParams($params));        
        }

        if($options['task'] == 'edit-item') {
            if(!empty($params['thumb'])){
                // Xóa hình cũ
                $this->deleteThumb($params['thumb_current']);
                // Up hình mới
                $params['thumb']      = $this->uploadThumb($params['thumb']);
            }

            $params['modified_by']   = "truongdinh";
            $params['modified']      = date('Y-m-d');

            self::where(['id' => $params['id'] ] )->update($this->prepareParams($params));
        }
    }

    public function deleteItem($params = null, $options = null) 
    { 
        if($options['task'] == 'delete-item') {
            $item   = self::getItem($params, ['task'=>'get-thumb']);
            $this->deleteThumb($item['thumb']);
            self::where('id', $params['id'])->delete();
        }
    }

}

