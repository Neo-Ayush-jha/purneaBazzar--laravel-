<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admincontroller extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    
    public function order(){
        return view('admin.manage.manageOrder');
    }
    public function barand(){
        return view('admin.manageBarand');
    }
   
}
