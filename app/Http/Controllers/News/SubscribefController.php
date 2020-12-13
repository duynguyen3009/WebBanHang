<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;;   
use Illuminate\Support\Facades\Session;
use Mail; 

use App\Models\SubscribeModel;

class SubscribefController extends Controller
{
    private $pathViewController = 'news.pages.subscribe.'; 
    public  $controllerName     = 'subscribef';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
        $this->model = new SubscribeModel();
    }

    public function getSubscribe(Request $request)
    {
        $params['subscribe']    = $request->subscribe;
        $task                   = "add-item";
        $result                 = $this->model->saveItem($params, ['task' => $task]);
        return json_encode($result);
        
    }
   
}