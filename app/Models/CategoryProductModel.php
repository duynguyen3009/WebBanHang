<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Kalnoy\Nestedset\NodeTrait;
use DB; 
class CategoryProductModel extends AdminModel
{
    use NodeTrait;
    protected  $table                   = 'category_product';
    protected  $controllerName          = 'categoryProduct';
    protected  $fieldSearchAccepted     = ['id', 'name']; 
    protected  $fillable                = ['name', 'status', 'ordering' ,'link','is_home'];
    protected  $crudNotAccepted         = ['_token', 'id'];
    
    
    public function listItems($params = null, $options = null) {
        
        $result = null;
        if($options['task'] == "admin-list-nested") {
            $query = self::defaultOrder()->withDepth()->having('depth', '>', 0)->get()->toFlatTree();
           if ($params['filter']['status'] !== "all")  {
               $query->where('status', '=', $params['filter']['status'] );
           }
           return $query;
           echo '<pre>';
           print_r($query);
           echo '</pre>';
                            
        }
    
        // if ( $params['filter']['category'] !== "default" )  {
        //     $query->where('a.category_id', '=', $params['filter']['category'] );
        // }
 
        // if ($params['search']['value'] !== "")  {
        //     if($params['search']['field'] == "all") {
        //         $query->where(function($query) use ($params){
        //             foreach($this->fieldSearchAccepted as $column){
        //                 $query->orWhere('a.' . $column, 'LIKE',  "%{$params['search']['value']}%" );
        //             }
        //         });
        //     } else if(in_array($params['search']['field'], $this->fieldSearchAccepted)) { 
        //         $query->where('a.' . $params['search']['field'], 'LIKE',  "%{$params['search']['value']}%" );
        //     } 
        // }
    
        // $result =  $query->orderBy('a.id', 'desc')
        //                 ->paginate($params['pagination']['totalItemsPerPage']);

      
        // GET MENU CHILREN IN FRONT END
        if($options['task'] == "news-list-nested") {
            return  self::withDepth()->get()->where('parent_id','<>',NULL)->toTree()->toArray();
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
            $result = self::select('id', 'name', 'is_home','status', 'link','parent_id')->where('id', $params['id'])->first();
        }

        if($options['task'] == "admin-get-nested") {
            return self::defaultOrder()->withDepth()->get()->toFlatTree();
         }

        if($options['task'] == 'news-get-breadcrumb-article') {
            $result = self::select('id', 'name', 'parent_id')->where('id', $params)->first();
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
        if($options['task'] == 'change-is-home') {
     
            $isHome = ($params['currentIsHome'] == "yes") ? "no" : "yes";
            $class  = ($params['currentIsHome'] == "yes") ? "warning"   : "primary";
            self::where('id', $params['id'])->update(['is_home' => $isHome ]);
            return [ 
                'name'     =>   config('zvn-notify.is_home.'.$isHome.''),
                'class'    =>   config('zvn-notify.is_home.'.$class.'') ,
                'link'     =>   route($this->controllerName .'/isHome',['id' => $params['id'],'isHome' => $isHome,])   ,
                'message'  =>   config('zvn-notify.is_home.message')  ,
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

