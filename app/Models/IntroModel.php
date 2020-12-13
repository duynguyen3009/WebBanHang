<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB; 
class IntroModel extends AdminModel
{
    public function __construct() {
        $this->table               = 'intro';
        $this->folderUpload        = 'intro' ; 
        $this->fieldSearchAccepted = ['name', 'content']; 
        $this->crudNotAccepted     = ['_token','thumb_current'];
    }



    public function getItem($params = null, $options = null) { 
        $result = null;
        if($options['task'] == 'get-item') {
            $result = self::select('id',  'content')->first()->toArray();
        }
      

        return $result;
    }

    public function saveItem($params = null, $options = null) { 

        if($options['task'] == 'add-item') {
            self::insert($this->prepareParams($params));        
        }

        if($options['task'] == 'edit-item') {
            self::where(['id' => $params['id'] ] )->update($this->prepareParams($params));
        }
    }


}

