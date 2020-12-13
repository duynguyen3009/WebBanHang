<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB; 
use Config;
class ScriptModel extends AdminModel
{
    public function __construct() {
        $this->table               = 'script';
        $this->folderUpload        = 'script' ; 
        $this->fieldSearchAccepted = ['link',]; 
        $this->crudNotAccepted     = ['_token'];
    }
    
    public function getItem($params = null, $options = null) { 
        $result = null;
        if($options['task'] == 'get-item') {
            $result = self::select('id','name','script')->where('name',$params)->first();
        }

        if($options['task'] == 'get-thumb') {
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
        }

        return $result;
    }

    public function saveItem($params = null, $options = null) { 
        
        if($options['task'] == 'add-item') {
            $params['created_by'] = "truongdinh";
            $params['created']    = date('Y-m-d');
            self::insert($this->prepareParams($params));        
        }

        if($options['task'] == 'edit-item') {
          
            $params['modified_by']   = "truongdinh";
            $params['modified']      = date('Y-m-d');
            self::where('name', $params['name'] )->update($this->prepareParams($params));
        }
    }

    public function deleteItem($params = null, $options = null) 
    { 
        if($options['task'] == 'delete-item') {
            self::where('id', $params['id'])->delete();
        }
        }

}

