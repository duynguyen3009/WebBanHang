<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Kalnoy\Nestedset\NodeTrait;
use DB; 
class MenuModel extends AdminModel
{
    use NodeTrait;
    protected  $table                   = 'menu';
    protected  $controllerName          = 'menu';
    protected  $fieldSearchAccepted     = ['id', 'name']; 
    protected  $fillable                = ['name', 'status', 'link','type_menu'];
    protected  $crudNotAccepted         = ['_token', 'id'];
  

    public function listItems($params = null, $options = null) {
     
        $result = null ;

        if($options['task'] == "admin-list-nested") {
           return $categories = self::defaultOrder()->withDepth()->having('depth', '>', 0)->get()->toFlatTree();
        }

        if($options['task'] == "news-list-nested") {
            return $categories = self::withDepth()->get()->toTree();
         }

        if($options['task'] == 'list-item-menu') {
            $query = $this->select('id', 'name', 'parent_id','type_menu','link')
                        ->defaultOrder()
                        ->where('status', '=', 'active' );
            $result = $query->get()->toArray();
        }

        if($options['task'] == "admin-list-items-in-selectbox") {
            $query = $this->select('id', 'name')
                        ->orderBy('name', 'asc')
                        ->where('status', '=', 'active' );
                        
            $result = $query->pluck('name', 'id')->toArray();
        
        }

        if($options['task'] == 'admin-get-name-in-selectbox') {
            $query = $this->select('id', 'name', 'parent_id')
                        ->where('status', '=', 'active' );
                        // ->where('parent_id', '=', null )
                        // ->limit(5);

            $result = $query->pluck('name', 'id')->toArray();
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

        if($options['task'] == 'admin-count-items-dashboard') {
            $result =  DB::table($this->table)
                        ->select(DB::raw('count(id) as count'))
                        ->get()->first();
         }

        return $result;
    }

    public function getItem($params = null, $options = null) { 
        $result = null;
        
        if($options['task'] == 'get-item') {
            $result = self::select('id', 'name', 'type_menu','status', 'link','parent_id')->where('id', $params['id'])->first();
        }

        if($options['task'] == "admin-get-nested") {
            return self::defaultOrder()->withDepth()->get()->toFlatTree();
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

        if($options['task'] == 'change-type-menu') {
            self::where('id', $params['id'])->update(['type_menu' => $params['type_menu']]);
            return [ 'message' => config('zvn-notify.select.message')] ;
        }

        if($options['task'] == 'add-item') {

            $categories = self::create($params);
            if (!empty($params['parent_id']) && $params['parent_id'] !== 'none') {
                $node = self::find($params['parent_id']);
                $node->appendNode($categories);
            }
        }
   
        if($options['task'] == 'edit-item') {
           
            $parent = self::find($params['parent_id']);
            $query = $current = self::find($params['id']);
            $query->update($this->prepareParams($params));
            if($current->parent_id != $params['parent_id']) $query->prependToNode($parent)->save();
        }
    }

    public function deleteItem($params = null, $options = null) 
    { 
        if($options['task'] == 'delete-item') {
            self::where('id', $params['id'])->delete();
        }
    }

}

