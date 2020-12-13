<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\QuestionModel as MainModel;
use App\Models\CategoryQuestionModel as NestedModel ;
use App\Http\Requests\QuestionRequest as MainRequest ;    

class QuestionController extends AdminController
{

    public function __construct()
    {
        $this->pathViewController = 'admin.pages.question.';  // slider
        $this->controllerName     = 'question';
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
    public function form(Request $request)
    {
        $item = null;
        if($request->id !== null ) {
            $params["id"] = $request->id;
            $item = $this->model->getItem( $params, ['task' => 'get-item']);
        }
        $modelCategory = new NestedModel();
        $itemsCategory = $modelCategory->listItems(null, ['task' => 'admin-list-nested']);
   
        return view($this->pathViewController .  'form', [
            'item'          => $item,
            'itemsCategory' =>$itemsCategory
        ]);
    }
    public function ordering(Request $request)
    {
        $params["currentOrdering"]  = $request->ordering;
        $params["id"]               = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-ordering']);
        echo json_encode($result);
        // return redirect()->route($this->controllerName)->with('zvn_notify', 'Cập nhật trạng thái thành công!');
    }
   
}