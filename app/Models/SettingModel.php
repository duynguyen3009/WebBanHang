<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB; 
use Config;
class SettingModel extends AdminModel
{
    public function __construct() {
        $this->table               = 'setting';
        $this->folderUpload        = 'setting' ; 
        $this->fieldSearchAccepted = ['link',]; 
        $this->crudNotAccepted     = ['_token'];
    }
    public function listItems($params = null, $options = null) {
        $result = null;

        if($options['task'] == 'front-end-list-item') {
            $result = $this->select('id', 'key_value', 'value')
            ->where('key_value', 'general')
            ->first()
            ->toArray();
        }
        return $result;
    }
    public function getItem($params = null, $options = null) { 
        $result = null;
        if($options['task'] == 'get-item') {
            $result = self::select('id','value')->where('key_value',$params)->first()->toArray();
        }

        if($options['task'] == 'get-item-social') {
            $result = self::select('id','value')->where('key_value',$params)->first()->toArray();
        }

        if($options['task'] == 'get-thumb') {
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
        }

        return $result;
    }

    public function saveItem($params = null, $options = null) { 
        
        if($options['task'] == 'add-item') {
          
            if($params['key_value'] == 'general'){
                $key_value = $params['key_value'];
                $this->crudNotAccepted  = ['_token','general','logo_current','id','key_value'];
                $params['logo']         = $this->uploadThumb($params['logo']);
                $value                  = json_encode($this->prepareParams($params));
            }elseif($params['key_value'] == 'email'){
                $key_value = $params['key_value'];
                $this->crudNotAccepted  = ['_token','id','key_value'];
                $value                  = json_encode($this->prepareParams($params));
            }elseif($params['key_value'] == 'social'){
                $key_value = $params['key_value'];
                $this->crudNotAccepted  = ['_token','id','key_value'];
                $value                  = json_encode($this->prepareParams($params));
            }
            
            $data = [
                'key_value'   =>  $key_value ,
                'value'       =>  $value ,
                'created_by' => "duy-nguyen",
                'created'    => date('Y-m-d'),
            ];
            self::insert($data);        
        }
        if($options['task'] == 'edit-item') {
            
            $key_value = $params['key_value'];
            if($params['key_value'] == 'general'){
                $key_value = $params['key_value'];
                if(!empty($params['logo'])){
                    $this->deleteThumb($params['logo_current']);
                    $params['logo']     = $this->uploadThumb($params['logo']);
                }else{
                    $params['logo']     = $params['logo_current'];
                }
                $value                  = json_encode($this->prepareParams($params));
            }else if($params['key_value'] == 'email'){
                $key_value = $params['key_value']; 
                $value                  = json_encode($this->prepareParams($params));              
            }else if($params['key_value'] == 'social'){
                $key_value = $params['key_value']; 
                $value     = json_encode($this->prepareParams($params));    
            }
            $data = [
                'value'       =>  $value ,
                'created_by' => "duy-nguyen",
                'created'    => date('Y-m-d'),
            ];
            self::where('key_value', $key_value )->update($data);
        }
    }

    public function deleteItem($params = null, $options = null) 
    { 
        if($options['task'] == 'delete-item') {
            self::where('id', $params['id'])->delete();
        }
        }

}

