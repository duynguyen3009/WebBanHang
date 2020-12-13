<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB; 
use Config;
class PriceProductModel extends AdminModel
{
    public function __construct() {
        $this->table               = 'price_product';
        $this->fieldSearchAccepted = ['id', 'name', 'description', 'link']; 
        $this->crudNotAccepted     = ['_token','thumb_current'];
    }
    public function listItems($params, $options = null)
    {
        $result = null;
        if ($options['task'] == 'list-item-by-product_id') {
            $result = self::select('id', 'attr_name', 'attr_value','price')
            ->where('product_id', $params['product_id'])
            ->get()
            ->toArray();
        }

        return $result;
    }

    public function getItem($params = null, $options = null) { 
        $result = null;
        
        if($options['task'] == 'get-item') {
            $result = self::select('id', 'product_id' ,'attr_name', 'attr_value','price')
            ->where('id', $params['id'])
            ->first()
            ->toArray();
        }

        return $result;
    }

    public function saveItem($params = null, $options = null) { 
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
            // $item   = self::getItem($params, ['task'=>'get-thumb']); // 
            // $this->deleteThumb($item['thumb']);
            self::where('id', $params['id'])->delete();
        }
    }

}

