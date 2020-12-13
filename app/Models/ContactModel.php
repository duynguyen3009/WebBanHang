<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB; 
use Config;
class ContactModel extends AdminModel
{
    public function __construct() {
        $this->table               = 'contact';
        $this->folderUpload        = 'contact' ; 
        $this->fieldSearchAccepted = ['name','email','phone']; 
        $this->crudNotAccepted     = ['_token','thumb_current'];
    }

    public function listItems($params = null, $options = null) {
     
        $result = null;
        if($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'name','phone','email', 'contact','created_date', 'contact_by');
    
            if ($params['filter']['contact'] !== "all")  {
                $query->where('contact', '=', $params['filter']['contact'] );
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

        if($options['task'] == 'news-list-items') {
            $query = $this->select('id', 'name')
                        ->where('status', '=', 'active' )
                        ->limit(5);

            $result = $query->get()->toArray();
        }
        return $result;
    }

    public function countItems($params = null, $options  = null) {
     
        $result = null;

        if($options['task'] == 'admin-count-items-group-by-status') {
         
            $query = $this::groupBy('contact')
                        ->select( DB::raw('contact , COUNT(id) as count') );

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
            $result = self::select('id' ,'name')->where('id', $params['id'])->first();
        }
        if($options['task'] == 'get-item-no-contact-yet') {
            $result = self::select('id', 'name','phone','email', 'contact','created_date', 'contact_by')->where('contact','no')->get()->toArray();
        }

        if($options['task'] == 'get-thumb') {
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
        }

        return $result;
    }

    public function saveItem($params = null, $options = null) { 

        if($options['task'] == 'change-status') {
            $message = ($params['currentStatus'] == "no") ? "message" : "yes";
            $status  = ($params['currentStatus'] == "no") ? "yes"     : "yes";
            $class   = ($params['currentStatus'] == "no") ? "success" : "success";
            ($params['currentStatus'] == "yes")  ? null : self::where('id', $params['id'])->update(['contact' => $status,'contact_by' => 'truongdinh', 'created_date' => date('Y-m-d')] );
            return [ 
                        'name'     =>   config('zvn-notify.contact.'.$status.''),
                        'class'    =>   config('zvn-notify.contact.'.$class.'') ,
                        'link'     =>   route($this->table .'/contact',['id' => $params['id'],'contact' => $status,]),
                        'message'  =>   config('zvn-notify.contact.'.$message.'')  ,
                    ];
        }

        if($options['task'] == 'add-item') {
            $params['created_by'] = "truongdinh";
            $params['created']    = date('Y-m-d');
            self::insert($this->prepareParams($params));        
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

