<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;;    
use App\Models\ArticleModel ;
use App\Models\ProductModel ;
use App\Models\AgenciesModel ;
use App\Models\TagModel ;
use App\Models\CategoryArticleModel ;


class CategoryController extends Controller
{
    private $pathViewController = 'news.pages.category.';  // slider
    private $controllerName     = 'category';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

   public function index(Request $request)
   {  
      $params['category_id']    = $request->category_id ;   
      $params['category_name']  = $request->category_name ;   
      $articleModel             = new ArticleModel() ;   
      $productModel             = new ProductModel() ;   
      $agenciesModel            = new AgenciesModel() ;   
      $tagModel                 = new TagModel() ;   
     
      $itemsArticleInCategory   = $articleModel->listItems($params ,[ 'task'=> 'news-list-items-in-category']) ;
      $itemsArticleNew          = $articleModel->listItems($params ,[ 'task'=> 'news-list-items-new']) ;
      $itemsProductNew          = $productModel->listItems($params ,[ 'task'=> 'news-list-items-new']) ;
      $itemsAgencies          = $agenciesModel->listItems($params ,[ 'task'=> 'news-list-items']) ;
      $itemsTag               = $tagModel->listItems($params ,[ 'task'=> 'news-list-items']) ;
      if(empty($itemsArticleInCategory))  return redirect()->route('home');
      return view($this->pathViewController .  'index' , compact('itemsArticleInCategory','params', 'itemsArticleNew', 'itemsProductNew', 'itemsAgencies', 'itemsTag') );
  
   }

   public function notFound(Request $request)
   {   
      return view($this->pathViewController .  'not_found', [
            'params'        => $this->params,
      ]);
   }

 
}