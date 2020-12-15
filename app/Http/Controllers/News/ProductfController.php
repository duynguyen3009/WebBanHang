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
      $cart = Session::get('cart');
      $productId        = $request->id;
      $priceProductId   = $request->id_price_product;
      $quantity         = $request->quantity;
      $checkExistId = false;
      if (empty($cart)) {
         $cart['quantity'][$productId] = $quantity;
      } else {
         if (key_exists($productId, $cart['quantity'])) {
            $checkExistId = true;
            $cart['quantity'][$productId] += $quantity;
         } else {
            $cart['quantity'][$productId] = $quantity;
         }
         unset($cart['quantity']['assets']);
      }

      session(['cart' => $cart]);
      $item    = $this->model->getItem(['id' => $productId],                  ['task' => 'get-product-in-cart']);
      $price   = $this->priceProductModel->getItem(['id' => $priceProductId], ['task' => 'get-item']);
     
      // $price = Template::showPrice($item);
      echo json_encode([
         'checkId' => $checkExistId,
         'message' => config('zvn-notify.cart.message'),
         'quantity' => $quantity,
         'product_id' => $productId,
         'thumb' => asset("uploads/" . json_decode($item['thumb'])[0]),
         'name' => $item['name'],
         'price' => $price['price'],
         'linkDeleteItem' => route($this->controllerName . '/deleteItemCart', ['id' => $productId]),
      ]);
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
      $cart = Session::get('cart');
      $productId = $request->id;
      $quantity = $cart['quantity'][$productId];
      unset($cart['quantity'][$productId]);
      session(['cart' => $cart]);
      echo json_encode(['productId' => $productId, 'productQuantity' => $quantity]);
   }

   public function updateQuantity(Request $request)
   {
      $cart = Session::get('cart');
      $productId = $request->id;
      $quantity = $request->quantity;
      if (key_exists($productId, $cart['quantity'])) {
         $cart['quantity'][$productId] = 0;
         $cart['quantity'][$productId] += $quantity;
      }
      $quantity = $cart['quantity'][$productId];
      session(['cart' => $cart]);
      echo json_encode(['productId' => $productId, 'productQuantity' => $quantity, 'cart' => $cart]);
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
