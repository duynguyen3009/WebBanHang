<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB; 
use Config;
class SubscribeModel extends AdminModel
{
    public function __construct() {
        $this->table               = 'subscribe';
        $this->fieldSearchAccepted = ['id',  'email']; 
        $this->crudNotAccepted     = ['_token'];
    }

    public function listItems($params = null, $options = null) {
     
        $result = null;

        if($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'email',  'status','created', 'created_by');
               
            if ($params['filter']['status'] !== "all")  {
                $query->where('status', '=', $params['filter']['status'] );
            }

            if ( $params['filter']['category'] !== "default" )  {
                $query->where('question_id', '=', $params['filter']['category'] );
            }

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

            $result =  $query->orderBy('id', 'desc')
                            ->paginate($params['pagination']['totalItemsPerPage']);

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
                $query->where('question_id', '=', $params['filter']['category'] );
            }
            $result = $query->get()->toArray();
           

        }

        return $result;
    }

    public function getItem($params = null, $options = null) { 
        $result = null;
        
        if($options['task'] == 'get-item') {
            $result = self::select('id', 'email',  'status','created', 'created_by')->where('id', $params['id'])->first();
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

        if($options['task'] == 'change-ordering') {
            $ordering = $params['currentOrdering'] ;
            self::where('id', $params['id'])->update(['ordering' => $ordering ]);
            return [ 
                        'message'  =>   config('zvn-notify.ordering.message')  ,
                   ];
        }
        if($options['task'] == 'change-category') {
            self::where('id', $params['id'])->update(['question_id' => $params['currentCategory']]);
            return [ 'message' => config('zvn-notify.select.message')] ;
        }
        if($options['task'] == 'add-item') {
           
            $params['created_by'] = "duy-nguyen";
            $params['created']    = date('Y-m-d');
            self::insert($params);   
            return [ 'message' => config('zvn-notify.subscribe.message')] ;     
        }

        if($options['task'] == 'edit-item') {
            if(!empty($params['thumb'])){
                $this->deleteThumb($params['thumb_current']);
                $params['thumb'] = $this->uploadThumb($params['thumb']);
            }
            $params['modified_by']   = "hailan";
            $params['modified']      = date('Y-m-d');
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }
    }

    public function deleteItem($params = null, $options = null) 
    { 
        if($options['task'] == 'delete-item') {
            self::where('id', $params['id'])->delete();
        }
    }

}

