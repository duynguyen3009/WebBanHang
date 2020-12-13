<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\ShippingModel as MainModel;
use App\Http\Requests\ShippingRequest as MainRequest ;    

class ShippingController extends AdminController
{

    public function __construct()
    {
        $this->pathViewController = 'admin.pages.shipping.';  // slider
        $this->controllerName     = 'shipping';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 5;
        parent::__construct();
    }
    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {

            $params = $request->all();
          
            $task   = "add-item";
            $notify = "Thêm phần tử thành công!";

            if($params['id'] !== null) {
                $task   = "edit-item";
                $notify = "Cập nhật phần tử thành công!";
            }
            $this->model->saveItem($params, ['task' => $task]);
            return redirect()->route($this->controllerName)->with("zvn_notify", $notify);
        }
    }
    public function price(Request $request) {
       
        $params["currentPrice"]    = $request->price;
        $params["id"]             = $request->id;
    
        $items = $this->model->saveItem($params, ['task' => 'change-price']);
        echo json_encode($items) ;
        // return redirect()->route($this->controllerName)->with("zvn_notify", "Cập nhật kiểu bài viết thành công!");
    }
}