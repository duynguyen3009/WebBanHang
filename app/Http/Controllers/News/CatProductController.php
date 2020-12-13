<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;;    
use App\Models\ProductModel ;
use App\Models\CategoryArticleModel ;


class CatProductController extends Controller
{
    private $pathViewController = 'news.pages.catproduct.';  // slider
    private $controllerName     = 'catProduct';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
       
    }

   public function index(Request $request)
   {  
      $params['id']         = $request->cat_pro_id  ;   
      $params['name']       = $request->cat_pro_name ;   
      $params["pagination"]["totalItemsPerPage"] = 20; 
      $productModel         = new ProductModel();
      $items                = $productModel->listItems($params,['task' => 'news-get-items-in-category']) ;
      if(empty($items))     return redirect()->route('home');
      
      return view($this->pathViewController .  'index' , compact('items' , 'params') );
   }


   
   public function sort(Request $request)
   {   
      $params['sort']      = $request->sort;
      $productModel         = new ProductModel();
      $items                = $productModel->listItems($params,['task' => 'news-sort-item']) ;
      return view($this->pathViewController .  'child.sort_product_list' , compact('items') );
      
}


   public function notFound(Request $request)
   {   
      return view($this->pathViewController .  'not_found', [
            'params'        => $this->params,
      ]);
   }

 
}