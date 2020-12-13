<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    protected $pathViewController = '';  // slider
    protected $controllerName     = '';
    protected $params             = [];
    protected $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }
    public function index(Request $request)
    {   

        $this->params['filter']['status']   = $request->input('filter_status', 'all' ) ;
        $this->params['filter']['category'] = $request->input('filter_category', 'default') ;
        $this->params['filter']['contact']  = $request->input('filter_contact', 'all') ;
        $this->params['search']['field']    = $request->input('search_field', '' ) ; // all id description
        $this->params['search']['value']    = $request->input('search_value', '' ) ;

        $items              = $this->model->listItems($this->params, ['task'  => 'admin-list-items']);

        $itemsStatusCount   = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']); // [ ['status', 'count']]

        return view($this->pathViewController .  'index', [
            'params'        => $this->params,
            'items'         => $items,
            'itemsStatusCount' =>  $itemsStatusCount
        ]);
    }
    public function form(Request $request)
    {
        $item = null;
        if($request->id !== null ) {
            $params["id"] = $request->id;
            $item = $this->model->getItem( $params, ['task' => 'get-item']);
        }
        
        return view($this->pathViewController .  'form', [
            'item'          => $item,
           
        ]);
    }
    public function status(Request $request)
    {
        $params["currentStatus"]  = $request->status;
        $params["id"]             = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-status']);
        echo json_encode($result);
        // return redirect()->route($this->controllerName)->with('zvn_notify', 'Cập nhật trạng thái thành công!');
    }
    public function type(Request $request) {
       
        $params["currentType"]    = $request->type;
        $params["id"]             = $request->id;
        $items = $this->model->saveItem($params, ['task' => 'change-type']);
        echo json_encode($items) ;
        // return redirect()->route($this->controllerName)->with("zvn_notify", "Cập nhật kiểu bài viết thành công!");
    }
    public function delete(Request $request)
    {
        $params["id"]             = $request->id;
        $this->model->deleteItem($params, ['task' => 'delete-item']);
        return redirect()->route($this->controllerName)->with('zvn_notify', 'Xóa phần tử thành công!');
    }
    public function node(Request $request){
        $node = $this->model->find($request->id);
        if($request->node == 'up') {
          $node->up();
        } else {
          $node->down();
        }
        return redirect()->route($this->controllerName)->with('success','Change Success!');
    }
    public function isHome(Request $request)
    {
        $params["currentIsHome"]  = $request->isHome;
        $params["id"]             = $request->id;
        $items = $this->model->saveItem($params, ['task' =>'change-is-home']);
      
        echo json_encode($items) ;
    }
    public function category(Request $request) {
       
        $params["currentCategory"]    = $request->category;
        $params["id"]                 = $request->id;
        $items = $this->model->saveItem($params, ['task' => 'change-category']);
        echo json_encode($items) ;
        // return redirect()->route($this->controllerName)->with("zvn_notify", "Cập nhật kiểu bài viết thành công!");
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