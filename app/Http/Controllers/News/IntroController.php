<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;;    
use App\Models\IntroModel ;



class IntroController extends Controller
{
    private $pathViewController = 'news.pages.intro.';  // slider
    private $controllerName     = 'intro';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

   public function index(Request $request)
   {  
      $introModel  = new IntroModel();  
      $itemsIntro   = $introModel->getItem(null ,[ 'task'=> 'get-item']) ;
      if(empty($itemsIntro))  return [] ;
      return view($this->pathViewController .  'index' , compact('itemsIntro') );
  
   }

   public function notFound(Request $request)
   {   
      return view($this->pathViewController .  'not_found', [
            'params'        => $this->params,
      ]);
   }

 
}