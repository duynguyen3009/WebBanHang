<?php

namespace App\Models;

use App\Models\AdminModel;
use App\Models\AttributeModel;
use App\Models\AttributeGroupModel;
use App\Models\PriceProductModel;
use App\Models\TagModel         as TagModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB;

use function GuzzleHttp\json_decode;

class ProductModel extends AdminModel
{
    public function __construct()
    {
        $this->table               = 'product';
        $this->controllerName      = 'product';
        $this->folderUpload        = 'product';
        $this->fieldSearchAccepted = ['id', 'name', 'link'];
        $this->crudNotAccepted     = ['_token', 'attribute_group_change_price', 'price_custom_name', 'price_custom_value', 'id', 'attribute_group', 'id_price_product','csrf-token'];
    }

    public function listItems($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == "admin-list-items") {
            $query = $this->select('product.id', 'product.name', 'promotion', 'value_promotion', 'product.attribute', 'product.price', 'product.thumb', 'product.status', 'product.type', 'category_product_id', 'cp.name as category_product_name')
                ->leftJoin('category_product as cp', 'product.category_product_id', '=', 'cp.id');
            // echo '<pre>';
            // print_r($params);
            // echo '</pre>';
            // die();
            if ($params['filter']['status'] !== "all") {
                $query->where('product.status', '=', $params['filter']['status']);
            }
            if ( $params['filter']['category'] !== "default" )  {
                $query->where('product.category_product_id', '=', $params['filter']['category'] );
            }
            if ($params['search']['value'] !== "") {
                if ($params['search']['field'] == "all") {
                    $query->where(function ($query) use ($params) {
                        foreach ($this->fieldSearchAccepted as $column) {
                            $query->orWhere('product.'.$column, 'LIKE',  "%{$params['search']['value']}%");
                        }
                    });
                } else if (in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%");
                }
            }

            $result =  $query->orderBy('product.id', 'desc')
                ->paginate($params['pagination']['totalItemsPerPage']);
        }

        $this->table   = 'product as p';
        if ($options['task'] == "news-get-items-featured") {
            $result = $this->select('p.id', 'p.name', 'p.price', 'p.thumb', 'p.category_product_id', 'promotion', 'value_promotion')
                ->leftJoin('category_product as c', 'p.category_product_id', '=', 'c.id')
                ->where('p.type',   '=', 'featured')
                ->where('p.status', '=', 'active')
                // ->where('p.category_product_id',   '=', 49)
                ->get()
                ->toArray();
        }
        if ($options['task'] == "news-get-items-accessory") {
            $result = $this->select('p.id', 'promotion', 'value_promotion', 'p.name', 'p.price', 'p.thumb', 'p.category_product_id')
                ->leftJoin('category_product as c', 'p.category_product_id', '=', 'c.id')
                ->where('p.type',   '=', 'featured')
                ->where('p.category_product_id',   '=', 63)
                ->get()
                ->toArray();
        }
        if ($options['task'] == "news-get-items-sale") {
            $result = $this->select('p.id', 'p.name', 'p.price', 'p.thumb', 'p.category_product_id', 'promotion', 'value_promotion')
                ->leftJoin('category_product as c', 'p.category_product_id', '=', 'c.id')
                ->where('p.status', '=', 'active')
                ->where('p.promotion',   '<>', 'default')
                ->get()
                ->toArray();
        }

        if ($options['task'] == "news-get-items-in-category") {

            $result = $this->select('p.id', 'p.name', 'p.price', 'p.thumb', 'promotion', 'value_promotion', 'p.category_product_id', 'c.name as cate_pro_name')
                ->leftJoin('category_product as c', 'p.category_product_id', '=', 'c.id')
                ->where('p.category_product_id', '=', $params['id'])
                // ->get()
                // ->toArray()
                ->paginate($params['pagination']['totalItemsPerPage']);
            if ($result) $result;
        }

        if ($options['task'] == "news-list-items-new") {
            $result = $this->select('id', 'name', 'price', 'thumb', 'promotion', 'value_promotion')
                ->where('status', '=', 'active')
                ->orderBy('id', 'desc')
                ->limit(3)
                ->get()
                ->toArray();
            if ($result) $result;
        }

        if ($options['task'] == "news-sort-item") {
            if ($params['sort'] == 'new_to_old' || $params['sort'] == 'default') { // mới đến cũ
                $result = $this->select('id', 'name', 'price', 'thumb', 'promotion', 'value_promotion')
                    ->where('status', '=', 'active')
                    ->orderBy('id', 'desc')
                    ->get()
                    ->toArray();
            }

            if ($params['sort'] == 'old_to_new') { // cũ đến mới
                $result = $this->select('id', 'name', 'price', 'thumb', 'promotion', 'value_promotion')
                    ->where('status', '=', 'active')
                    ->orderBy('id', 'asc')
                    ->get()
                    ->toArray();
            }

            if ($params['sort'] == 'price_hight_to_short') { // giá cao đên thấp
                $result = $this->select('id', 'name', 'price', 'thumb', 'promotion', 'value_promotion')
                    ->where('status', '=', 'active')
                    ->orderBy('price', 'desc')
                    ->get()
                    ->toArray();
            }

            if ($params['sort'] == 'price_short_to_hight') { // giá thấp đên cao
                $result = $this->select('id', 'name', 'price', 'thumb', 'promotion', 'value_promotion')
                    ->where('status', '=', 'active')
                    ->orderBy('price', 'asc')
                    ->get()
                    ->toArray();
            }
        }

        if ($options['task'] == "front-end-list-product") {
            $result = $this->select('id', 'name', 'price', 'thumb')
                ->get()
                ->toArray();
        }

        if ($options['task'] == "front-end-product-cart") {
            $result = $this->select('id', 'name', 'price', 'thumb')
                ->where('id', $params['id'])
                ->get()
                ->toArray();
        }

        if ($options['task'] == "front-end-get-product-featured") {
            $result = $this->select('id', 'name', 'price', 'thumb', 'promotion', 'value_promotion')
                ->where('type', 'featured')
                ->where('status', 'active')
                ->get()
                ->toArray();
        }
        if ($options['task'] == "front-end-get-product-search") {
            $result = $this->select('id', 'name', 'price', 'thumb', 'promotion', 'value_promotion')
                ->orWhere('name', 'LIKE',  "%{$params['search']}%")
                ->where('status', 'active')
                ->get()
                ->toArray();
        }

        return $result;
    }

    public function countItems($params = null, $options  = null)
    {

        $result = null;

        if ($options['task'] == 'admin-count-items-group-by-status') {
            $query = $this::groupBy('status')
                ->select(DB::raw('status , COUNT(id) as count'));

            if ($params['search']['value'] !== "") {
                if ($params['search']['field'] == "all") {
                    $query->where(function ($query) use ($params) {
                        foreach ($this->fieldSearchAccepted as $column) {
                            $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%");
                        }
                    });
                } else if (in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%");
                }
            }
            $result = $query->get()->toArray();
        }

        if ($options['task'] == 'admin-count-items-dashboard') {
            $result =  DB::table($this->table)
                ->select(DB::raw('count(id) as count'))
                ->get()->first();
        }


        return $result;
    }
    public function getItem($params = null, $options = null)
    {
        $result = null;
        if ($options['task'] == 'get-item') {
            $result = self::select('product.id', 'product.name', 'product.promotion', 'product.value_promotion', 'product.status', 'product.price', 'product.thumb', 'category_product_id', 'product.attribute', 'product.attribute_group_id', 'product.link', 'product.content', 'product.tags', 'product.price_custom', 'product.attribute_name_price_custom', 'product.type', 't.name as tag_name')
                ->leftJoin('tag as t', 'product.tags', '=', 't.id')
                ->where('product.id', $params['id'])
                ->first()
                ->toArray();
        }

        if ($options['task'] == 'get-product-in-cart') {
            $result = self::select('id', 'name', 'status', 'price', 'thumb', 'promotion', 'value_promotion')
                ->where('id', $params)
                ->first()
                ->toArray();
        }

        if ($options['task'] == 'get-price-product-order') {
            $result = self::select('price')->where('id', $params)->get()->first()->toArray();
        }

        if ($options['task'] == 'admin-get-name-attribute') {
            $result = AttributeModel::select('id', 'name', 'status', 'change_price')
                ->where('attribute_group_id', $params['id'])
                ->where('change_price', 'no')
                ->get()
                ->toArray();
        }
        if ($options['task'] == 'admin-get-name-attribute-change-price') {
            $result = AttributeModel::select('id', 'name', 'status', 'change_price')
                ->where('attribute_group_id', $params['id'])
                ->where('change_price', 'yes')
                ->get()
                ->toArray();
        }

        if ($options['task'] == "front-end-product-detail") {
            $result = $this->select('product.id', 'product.name', 'product.status', 'product.price', 'product.thumb', 'category_product_id', 'product.attribute', 'product.attribute_group_id', 'product.link', 'product.content', 'product.tags', 'product.promotion', 'product.value_promotion', 'product.price_custom', 'product.attribute_name_price_custom', 'product.type', 'cp.name as category_product_name')
                ->leftJoin('category_product as cp', 'product.category_product_id', '=', 'cp.id')
                ->where('product.id', $params)
                ->first()
                ->toArray();
        }
        return $result;
    }
    public function saveItem($params = null, $options = null)
    {
        if ($options['task'] == 'change-status') {
            $status = ($params['currentStatus'] == "active") ? "inactive" : "active";
            $class  = ($params['currentStatus'] == "active") ? "info"     : "success";
            self::where('id', $params['id'])->update(['status' => $status]);
            return [
                'name'     =>   config('zvn-notify.status.' . $status . ''),
                'class'    =>   config('zvn-notify.status.' . $class . ''),
                'link'     =>   route($this->controllerName . '/status', ['id' => $params['id'], 'status' => $status,]),
                'message'  =>   config('zvn-notify.status.message'),
            ];
        }
        if ($options['task'] == 'change-type') {
            self::where('id', $params['id'])->update(['type' => $params['currentType']]);
            return ['message' => config('zvn-notify.select.message')];
        }
        if($options['task'] == 'change-category') {
            self::where('id', $params['id'])->update(['category_product_id' => $params['currentCategory']]);
            return [ 'message' => config('zvn-notify.select.message')] ;
        }
        if ($options['task'] == 'add-item') {
            $valueAttribute = [];
            if (!empty($params['attribute'])) {
                foreach ($params['attribute'] as $key => $value) {
                    if ($key != 'newattr') { // NGƯỜI DÙNG CHỈ CHỌN THUỘC TÍNH CÓ SẴN(SELECTBOX)
                        $value = explode(',', $value[0]);
                        $valueAttribute[] = (["name"  => $key, "value" =>  json_encode($value)]);
                    } elseif ($key == 'newattr') { // NGƯỜI DÙNG  CHỌN THÊM THUỘC TÍNH (SINH RA 2 INPUT ĐỂ NHẬP)
                        $attrModel = new AttributeModel();
                        foreach ($params['attribute']['newattr'] as $key => $value) {
                            $nameAttr       =   $value['name'];
                            $attrGroup      =   $params['attribute_group_id'];
                            $itemsAttr      =   ['name' => $nameAttr, 'attribute_group_id' => $attrGroup, 'status' => 'active', 'change_price' => 'no'];
                            $result         = $attrModel->saveItem($itemsAttr, ['task' => 'add-item-in-product-new']);
                            $valueNewAttr = explode(',', $value['value']);
                            $valueAttribute[] = (["name"  => $result, "value" =>  json_encode($valueNewAttr)]);
                        }
                    }
                }
            }


            $params['attribute']                = json_encode($valueAttribute);
            $params['tags']                     = isset($params['tags']) ? json_encode($params['tags']) : null;
            $params['attribute_group_id']       = isset($params['attribute_group_id']) ? $params['attribute_group_id'] : null;
            $params['attribute_name_price_custom']       = isset($params['attribute_name_price_custom']) ? $params['attribute_name_price_custom'] : null;
            $params['thumb']                    = isset($params['thumb']) ? json_encode($params['thumb']['name']) : null;
            $params['created_by']               = "duy-nguyen";
            $params['created']                  = date('Y-m-d');
            $params['price_custom_name']        = isset($params['price_custom_name']) ? $params['price_custom_name'] : null;
            $params['price_custom_value']       = isset($params['price_custom_value']) ? $params['price_custom_value'] : null;
            $params['price_custom']             = json_encode((["name"  => json_encode($params['price_custom_name']), "value" =>  json_encode($params['price_custom_value'])]));
            $result = self::insertGetId($this->prepareParams($params));

            // THÊM GIÁ TRỊ VÀO BẢNG PRICE_PRODUCT
            if (isset($params['attribute_name_price_custom']) && $params['attribute_name_price_custom'] != 'default') {
                $priceProductModel  = new PriceProductModel();
                $attrGroupModel          = new AttributeGroupModel();
                $nameAttr           =   $attrGroupModel->getItem($params['attribute_name_price_custom'], ['task' => 'admin-get-item-in-product']);
                $arrAttrChangePrice         = array_combine($params['price_custom_name'], $params['price_custom_value']);
                foreach ($arrAttrChangePrice as $valueAttr => $priceAttr) {
                    $itemsAttrChangePrice      =   ['product_id' => $result, 'attr_name' => $nameAttr['name'], 'attr_value' => $valueAttr, 'price' => $priceAttr];
                    $priceProductModel->saveItem($itemsAttrChangePrice, ['task' => 'add-item']);
                }
            }
        }

        if ($options['task'] == 'edit-item') {
            $valueAttribute = [];
            // if (isset($params['attribute_name_price_custom']) && $params['attribute_name_price_custom'] != null) {
             
            //     $priceProductModel          = new PriceProductModel();
            //     $attrGroupModel             = new AttributeGroupModel();
            //     $nameAttr                   = $attrGroupModel->getItem($params['attribute_name_price_custom'], ['task' => 'admin-get-item-in-product']);
            //     $arrAttrChangePrice         = array_combine($params['price_custom_name'], $params['price_custom_value']);
            //     foreach ($arrAttrChangePrice as $valueAttr => $priceAttr) {
            //         $itemsAttrChangePrice      =   [
            //             'id'            => 23, 
            //             'product_id'    => $params['id'], 
            //             'attr_name'     => $nameAttr['name'], 
            //             'attr_value'    => $valueAttr, 
            //             'price'         => $priceAttr
            //         ];
            //     }
            //     $priceProductModel->saveItem($itemsAttrChangePrice, ['task' => 'edit-item']);
            // }
            

            if (!empty($params['attribute'])) {
                foreach ($params['attribute']['newattr'] as $key => $value) {
                    $valueAttribute[] = (["name"  => $key, "value" =>  json_encode(explode(',', $value['value']))]);
                }
            }

            $params['attribute']            = json_encode($valueAttribute);
            $params['tags']                 = isset($params['tags']) ? json_encode($params['tags']) : null;
            $params['attribute_group_id']   = isset($params['attribute_group_id']) ? $params['attribute_group_id'] : null;
            $params['thumb']                = isset($params['thumb']) ? json_encode($params['thumb']['name']) : null;
            $params['price_custom_name']    = isset($params['price_custom_name']) ? $params['price_custom_name'] : null;
            $params['price_custom_value']   = isset($params['price_custom_value']) ? $params['price_custom_value'] : null;
            $params['price_custom']         = json_encode((["name"  => json_encode($params['price_custom_name']), "value" =>  json_encode($params['price_custom_value'])]));
            $params['modified_by']          = "duy-nguyen";
            $params['modified']             = date('Y-m-d');
            self::where('id', $params['id'])->update($this->prepareParams($params));
            
        }
    }
    public function deleteItem($params = null, $options = null)
    {
        if ($options['task'] == 'delete-item') {
            $item   = self::getItem($params, ['task' => 'get-thumb']);
            $this->deleteThumb($item['thumb']);
            self::where('id', $params['id'])->delete();
        }
    }
}
