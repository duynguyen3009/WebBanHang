<?php

namespace App\Http\Controllers\News;

use App\Helpers\Template;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\ShippingModel;
use App\Models\CouponModel;
use App\Models\PriceProductModel;
use function GuzzleHttp\json_decode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductfController extends Controller
{
   private $pathViewController = 'news.pages.product.';
   private $controllerName = 'productf';
   private $params = [];
   private $model;

   public function __construct()
   {
      view()->share('controllerName', $this->controllerName);
      $this->model               = new ProductModel();
      $this->priceProductModel   = new PriceProductModel();
   }

   public function index(Request $request)
   {
      $params['id'] = $request->product_id;
      $productModel = new ProductModel();
      $item = $productModel->getItem($params['id'], ['task' => 'front-end-product-detail']);
      $itemsFeatured = $productModel->listItems(null, ['task' => 'front-end-get-product-featured']);
      return view($this->pathViewController . 'index', compact('item', 'itemsFeatured'));
   }

   public function cart(Request $request)
   {
      $cart             = Session::get('cart');
      $productId        = $request->id;
      $quantity         = $request->quantity;
      $id_attribute     = $request->id_attribute;
      $checkExistId = false;
      if (empty($cart)) {
         $cart[$productId] = [$id_attribute => $quantity];
      } else {
         if (key_exists($productId, $cart)) {
            $checkExistId = true;
            if(key_exists($id_attribute, $cart[$productId])){
               $cart[$productId][$id_attribute] += $quantity;
            }else{
               $cart[$productId][$id_attribute] = $quantity;
            }
         } else {
            $cart[$productId] = [$id_attribute => $quantity];
         }
      }

      $totalQuantity = Template::countTotalQuantity($cart);
      unset($cart['quantity']);
      session(['cart' => $cart]);
      echo json_encode([
            'totalQuantity' => $totalQuantity, 
            'message'         => config('zvn-notify.cart.message'),
         ] );
      // echo json_encode([
      //    'checkId'         => $checkExistId,
      //    'message'         => config('zvn-notify.cart.message'),
      //    'quantity'        => $quantity,
      //    'product_id'      => $productId,
      //    'thumb'           => asset("uploads/" . json_decode($item['thumb'])[0]),
      //    'name'            => $item['name'],
      //    // 'price'           => $price['price'],
      //    'nameAttr'        => $nameAttr,
      //    'valueAttr'        => $valueAttr,
      //    'linkDeleteItem'  => route($this->controllerName . '/deleteItemCart', ['id' => $productId]),
      // ]);
   }

   public function detailCart(Request $request)
   {
      $cart = Session::get('cart'); // lay session cart ra
      return view($this->pathViewController . 'cart', compact('cart'));
   }

   public function notFound(Request $request)
   {
      return view($this->pathViewController . 'not_found', [
         'params' => $this->params,
      ]);
   }

   public function deleteItemCart(Request $request)
   {
      $cart       = Session::get('cart');
      $productId  = $request->id;
      $idAttr     = $request->id_attribute;
      $quantity   = $request->quantity;
      unset($cart[$productId][$idAttr]);
      // nếu thuộc tính còn 1 giá trị thì xóa luôn cái id đó, còn không thì chỉ xóa thuộc tính
      session(['cart' => $cart]);
      echo json_encode([
            'quantity'           => $quantity,
            'productId'          => $productId,
            'idAttr'             => $idAttr,
            'message'            => config('zvn-notify.remove.message'),
         ] );
   }

   public function updateQuantity(Request $request)
   {
      $cart       = Session::get('cart');
      $productId  = $request->id;
      $quantity   = $request->quantity;
      $idAttr     = $request->id_attribute;
     
      if (key_exists($productId, $cart)) {
         if(key_exists($idAttr, $cart[$productId])){
            $cart[$productId][$idAttr] = $quantity;
         }
      } else {
         $cart[$productId] = [$idAttr => $quantity];
      }
      $quantity = $cart[$productId][$idAttr];
      session(['cart' => $cart]);
      echo json_encode([
         'quantity'        => $quantity, 
         'message'         => config('zvn-notify.quantity.message'),
      ] );
   }

   public function getPriceShipping(Request $request)
   {
      $params['id']            = $request->id;
      $shippingModel = new ShippingModel();
      $item          = $shippingModel->getItem($params, ['task' => 'get-item']);
      if ($params['id'] == 'default') {
         $item = null;
      }
      echo json_encode($item);
   }

   public function getCoupon(Request $request)
   {
      $params['coupon']  = $request->coupon;
      $couponModel      = new CouponModel();
      $item             = $couponModel->getItem($params, ['task' => 'front-end-get-item']);
      echo json_encode($item);
   }
   public function search(Request $request)
   {
      $params        = $request->all();
      $itemsSearch   = $this->model->listItems($params, ['task' => 'front-end-get-product-search']);
      return view('news.pages.catproduct.search', compact('itemsSearch', 'params'));
      // $couponModel      = new CouponModel();
      // $item             = $couponModel->getItem($params, ['task' => 'front-end-get-item']);
      // echo json_encode($item);
   }
}
