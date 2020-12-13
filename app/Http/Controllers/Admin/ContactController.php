<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\ContactModel as MainModel;
use App\Http\Requests\VideoRequest as MainRequest ;    

class ContactController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.contact.';  // slider
        $this->controllerName     = 'contact';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 5;
        parent::__construct();
    }
    
    public function save(Request $request)
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
    public function contact(Request $request)
    {
        $params["currentStatus"]  = $request->contact;
        $params["id"]             = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-status']);
        echo json_encode($result);
        // return redirect()->route($this->controllerName)->with('zvn_notify', 'Cập nhật trạng thái thành công!');
    }

   
}