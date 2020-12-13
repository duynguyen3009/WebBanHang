<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\SettingModel as MainModel;
use App\Http\Requests\SettingRequest as MainRequest ;    

class SettingController extends AdminController
{

    public function __construct()
    {
        $this->pathViewController = 'admin.pages.setting.';  // slider
        $this->controllerName     = 'setting';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 5;
        parent::__construct();
    }
    public function index(Request $request)
    {   

        $this->params['type']  = $request->input('type', '' ) ;
        return view($this->pathViewController .  'index', [
         
            'params'        => $this->params,
        ]);
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
 
            return back()->withInput()->with("zvn_notify", $notify);
        }
    }
   
}