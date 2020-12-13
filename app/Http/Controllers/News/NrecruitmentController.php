<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;;    
use App\Models\SettingModel ;
use App\Models\SliderModel ;
use App\Models\MenuModel ;
use App\Models\FeedbackModel ;
use App\Models\ArticleModel ;
use App\Models\ProductModel ;


class NrecruitmentController extends Controller
{
    private $pathViewController = 'news.pages.recruitment.';  // slider
    private $controllerName     = 'recruitment';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

   public function index(Request $request)
   {  
   
      return view($this->pathViewController .  'index' );
   }

   public function notFound(Request $request)
   {   
      return view($this->pathViewController .  'not_found', [
            'params'        => $this->params,
      ]);
   }

 
}