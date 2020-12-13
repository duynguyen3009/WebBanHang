<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;;    
use App\Models\ArticleModel ;
use App\Models\FeedbackModel ;
use App\Models\CategoryArticleModel ;
use App\Models\ProductModel ;
use App\Models\AgenciesModel ;
use App\Models\TagModel ;


class ArticleController extends Controller
{
    private $pathViewController = 'news.pages.article.';  // slider
    private $controllerName     = 'article';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

   public function index(Request $request)
   {  
      $params['article_id']               = $request->article_id ;   
      $articleModel                       = new ArticleModel() ;   
      $categoryArticleModel               = new CategoryArticleModel() ;   
      $feedbackModel                      = new FeedbackModel() ;   
      $productModel                       = new ProductModel() ;   
      $agenciesModel                      = new AgenciesModel() ;   
      $tagModel                           = new TagModel() ;   

      $itemsArticle                       = $articleModel->getItem($params ,[ 'task'=> 'news-get-item']) ;
      $params["category_id"]              = $itemsArticle['category_id'];
      if(empty($itemsArticle))  return redirect()->route('home');
      $itemsArticle['related_articles']   = $articleModel->listItems($params, ['task'  => 'news-list-items-related-in-category']);
      $articleLastest                     = $articleModel->listItems($params, ['task'  => 'news-list-items-latest']); 
      $itemsFeedback                      = $feedbackModel->listItems($params, ['task'  => 'news-list-items']); 
      $itemsArticleNew          = $articleModel->listItems($params ,[ 'task'=> 'news-list-items-new']) ;
      $itemsProductNew          = $productModel->listItems($params ,[ 'task'=> 'news-list-items-new']) ;
      $itemsAgencies          = $agenciesModel->listItems($params ,[ 'task'=> 'news-list-items']) ;
      $itemsTag               = $tagModel->listItems($params ,[ 'task'=> 'news-list-items']) ;
      return view($this->pathViewController .  'index' , compact('itemsSetting','itemsArticle','articleLastest', 'itemsFeedback','itemsArticleNew', 'itemsProductNew', 'itemsAgencies', 'itemsTag') );
   }

   public function notFound(Request $request)
   {   
      return view($this->pathViewController .  'not_found', [
            'params'        => $this->params,
      ]);
   }

   public function postComment(Request $request)
   {   
      if ($request->method() == 'POST') {
         $params        = $request->all();
         $feedbackModel = new FeedbackModel();
         $feedbackModel->saveItem($params, ['task' => 'news-post-comment']);
         return redirect()->route('home/success');
     }
   }

 
}