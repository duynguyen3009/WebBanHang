<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminController as AdminController;
use Illuminate\Http\Request;
use App\Models\ProductModel           as MainModel;
use App\Models\TagModel;
use App\Models\AttributeModel          as AttributeModel;
use App\Http\Requests\ProductRequest   as MainRequest;
use App\File;
use App\Models\PriceProductModel;
use Illuminate\Support\Facades\Storage;
use DB;
 
class ProductController extends AdminController
{
   public function __construct()
   {
      $this->pathViewController = 'admin.pages.product.';
      $this->controllerName     = 'product';
      $this->model = new MainModel();
      $this->params["pagination"]["totalItemsPerPage"] = 15;
      $this->priceProductModel = new PriceProductModel();
      parent::__construct();
   }

   public function form(Request $request)
   {
      $item = null;
      if ($request->id !== null) {
         $params["id"] = $request->id;
         $item                         = $this->model->getItem($params, ['task' => 'get-item']);
         $item['price_product_list']   = $this->priceProductModel->listItems(['product_id' => $item['id']], ['task' => 'list-item-by-product_id']);
      }

      return view($this->pathViewController .  'form', [
         'item'          => $item,

      ]);
   }

   public function save(MainRequest $request)
   {
      if ($request->method() == 'POST') {
         $params = $request->all();
         $task   = "add-item";
         $notify = "Thêm phần tử thành công!";

         if (isset($params['id']) && $params['id'] !== null) {
            $task   = "edit-item";
            $notify = "Cập nhật phần tử thành công!";
         }

         $this->model->saveItem($params, ['task' => $task]);
         return redirect()->route($this->controllerName)->with("zvn_notify", $notify);
      }
   }
   public function storeMedia(Request $request)
   {
      $path = public_path('uploads');

      if (!file_exists($path)) {
         mkdir($path, 0777, true);
      }

      $file = $request->file('file');
      $name = '1-' . uniqid() . '_' . trim($file->getClientOriginalName());

      $file->move($path, $name);

      return response()->json([
         'name'          => $name,
         'original_name' => $file->getClientOriginalName(),
      ]);
   }
   public function getAttribute(Request $request)
   {
      $params["id"]                 = $request->id;
      $items = $this->model->getItem($params, ['task' => 'admin-get-name-attribute']);
      return view($this->pathViewController .  'childs.product_show_attribute', [
         'params'        => $this->params,
         'items'         => $items,
      ]);
   }
   public function getAttributeChangePrice(Request $request)
   {
      $params["id"]                 = $request->id;
      $items = $this->model->getItem($params, ['task' => 'admin-get-name-attribute-change-price']);
      return view($this->pathViewController .  'childs.product_show_attribute', [
         'params'        => $this->params,
         'items'         => $items,
      ]);
   }
   public function autocomplete(Request $request)
   {
      $tag     = new TagModel();
      $term    = $request->get('term');
      $items   = $tag->listItems($term, ['task' => 'admin-product-tag']);
      $names   = [];
      foreach ($items as $item) {
         array_push($names, $item['name']);
      }
      echo json_encode($names);
   }

   public function addPriceRow()
   {
      return view($this->pathViewController .  'childs.product_price_row');
   }
   public function addPriceRowNoChangePrice()
   {
      return view($this->pathViewController .  'childs.product_attr_no_change_price_row');
   }
   public function updateAttrPrice(Request $request) {
      $params = $request->attr_price;
      DB::table('price_product')->where('id',$params['id'])->update(['price' => $params['price']]);
      $product = $request->product;
      $product_id = $request->product_id;
      $tmp = [];
      foreach ($product as $key => $value) {
         $tmp['name'][] = $value['name'];
         $tmp['value'][] = $value['value'];
      }
      $tmp['name'] = json_encode($tmp['name']);
      $tmp['value'] = json_encode($tmp['value']);
      $product = json_encode($tmp);
      $result = DB::table('product')->where('id',$product_id)->update(['price_custom' => $product]);
      if($result) echo true;
   }
   public function category(Request $request) {
       
      $params["currentCategory"]    = $request->category;
      $params["id"]             = $request->id;
      $items = $this->model->saveItem($params, ['task' => 'change-category']);
      echo json_encode($items) ;
      // return redirect()->route($this->controllerName)->with("zvn_notify", "Cập nhật kiểu bài viết thành công!");
  }
}
