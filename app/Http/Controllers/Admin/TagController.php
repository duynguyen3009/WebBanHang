<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TagModel           as MainModel;
use App\Http\Requests\TagRequest  as MainRequest ;    

class TagController extends AdminController
{

    public function __construct()
    {
      $this->pathViewController = 'admin.pages.tag.'; 
      $this->controllerName     = 'tag';
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

            if(isset($params['id']) && $params['id'] !== null) {
                $task   = "edit-item";
                $notify = "Cập nhật phần tử thành công!";
            }
            $this->model->saveItem($params, ['task' => $task]);
            return redirect()->route($this->controllerName)->with("zvn_notify", $notify);
        }
    }
   

}