<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ImageController extends Controller
{

    protected $pathViewController = 'admin.pages.image.';  // slider

    public function index(Request $request)
    {         
        return view($this->pathViewController .  'index');
    }
   
}