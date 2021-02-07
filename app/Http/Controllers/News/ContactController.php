<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;;   
use Illuminate\Support\Facades\Session;
use Mail; 

use App\Models\SettingModel;
use App\Models\ContactModel;

class ContactController extends Controller
{
    private $pathViewController = 'news.pages.contact.'; 
    public  $controllerName     = 'contact';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
        $this->model = new ContactModel();
    }

    public function index(Request $request)
    {   
        $settingModel   = new SettingModel();
        $items          = $settingModel->listItems(null, ['task'   => 'front-end-list-item']);
        return view($this->pathViewController .  'index', compact('items'));

    }

    public function postContact(Request $request)
    {   
        if ($request->method() == 'POST') {
            $params         = $request->all();
            $task           = "add-item";
            $notify         = "Bạn đã gửi thông tin liên hệ thành công!";
            $this->model->saveItem($params, ['task' => 'add-item']);
            // if(!empty($params['email'])) {
            //     $SettingModel = new SettingModel();
            //     $mailInfo = $SettingModel->getItem(null,['task' => 'setting-email']);
            //     Mailer::sendMail($mailInfo,$params['email']);
            //   }
            // Mail::send('email', $params, function($message){
            //         $message->from('dinhduy700@gmail.com', 'SmallSpider');
            //         $message->to('dinhduy7001@gmail.com', 'Visitor')->subject('Visitor Feedback!');
            //         $message->subject('Test Send Email Laravel');
            //     });
            //     Session::flash('flash_message', 'Send message successfully!');
            // return redirect()->route($this->controllerName)->with("news_notify", $notify);
            return redirect()->route('home/success');
        }
    }
}