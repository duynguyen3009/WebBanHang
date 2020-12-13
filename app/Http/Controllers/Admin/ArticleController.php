<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\ArticleModel as MainModel;
use App\Models\CategoryArticleModel as NestedModel ;
use App\Http\Requests\ArticleRequest as MainRequest ;    

class ArticleController extends AdminController
{
  

    public function __construct()
    {
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 5;
        $this->pathViewController = 'admin.pages.article.';  // slider
        $this->controllerName     = 'article';

        parent::__construct();
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
    public function category(Request $request) {
       
        $params["currentCategory"]    = $request->category;
        $params["id"]             = $request->id;
        $items = $this->model->saveItem($params, ['task' => 'change-category']);
        echo json_encode($items) ;
        // return redirect()->route($this->controllerName)->with("zvn_notify", "Cập nhật kiểu bài viết thành công!");
    }

   
}