<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\IntroModel as MainModel;
class IntroController extends AdminController
{
  

    public function __construct()
    {
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 5;
        $this->pathViewController = 'admin.pages.intro.';  // slider
        $this->controllerName     = 'intro';

        parent::__construct();
    }
    public function index(Request $request)
    {   

        $items              = $this->model->getItem(null, ['task'  => 'get-item']);
        return view($this->pathViewController .  'index', [
            'items'        => $items,
        ]);
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
            return back()->withInput()->with("zvn_notify", $notify);
        }
    }
   

   
}