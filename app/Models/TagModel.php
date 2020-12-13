<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB; 
class TagModel extends AdminModel
{
    public function __construct() {
        $this->table               = 'tag';
        $this->controllerName      = 'tag';
        $this->fieldSearchAccepted = ['id', 'name']; 
        $this->crudNotAccepted     = ['_token', 'id'];
    }

    public function listItems($params = null, $options = null) {
     
        $result = null;

        if($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'name', 'status', 'ordering');
               
            if ($params['filter']['status'] !== "all")  {
                $query->where('status', '=', $params['filter']['status'] );
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

        if($options['task'] == "admin-product-tag") {
            $result = $this->where('name', 'LIKE',  '%'.$params.'%')->get();
        }

        if($options['task'] == "admin-get-name") {
            $result = $this->select('id', 'name')->pluck('name', 'id')->toArray();
            //  $result = $query->pluck('name', 'id')->toArray();
        }

        if($options['task'] == "news-list-items") {
            $result = $this->select('id', 'name')
            ->where('status', 'active')
            ->limit(9)
            ->get()
            ->toArray();
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

            $result = $query->get()->toArray();
           

        }

        return $result;
    }

    public function getItem($params = null, $options = null) { 
        $result = null;
        
        if($options['task'] == 'get-item') {
            $result =  self::select('attribute.id','attribute.name','attribute.status','ag.id as attribute_group_id')
                    ->leftJoin('attribute_group as ag', 'ag.id', '=', 'attribute.attribute_group_id')
                    ->where('attribute.id',$params['id'])
                    ->first() ;
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
                'link'     =>   route($this->controllerName .'/status',['id' => $params['id'],'status' => $status,])   ,
                'message'  =>   config('zvn-notify.status.message')  ,
            ];
        }

        if($options['task'] == 'add-item') {
            self::insert($this->prepareParams($params));        
        }

        if($options['task'] == 'edit-item') {
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

