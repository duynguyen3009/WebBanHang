<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;;    

class CheckOutController extends Controller
{
    private $pathViewController = 'news.pages.checkout.';  // slider
    private $controllerName     = 'checkOut';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

   public function index(Request $request)
   {  
        $total =  $request->total;
        return view($this->pathViewController .  'index', compact('total') );
   }

   public function maintenance(Request $request)
   {   
      return view($this->pathViewController .  'maintenance', [
            'params'        => $this->params,
      ]);
   }
 
}