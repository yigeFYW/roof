<?php

namespace App\Http\Controllers\Admin;

use App\AccountModel;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller{
    protected $middleware = ['App\Http\Middleware\Authenticate'=>[]];

    public function index(Request $req){
        $data['name'] = Auth::user()->name;
        return view('admin/index',$data);
    }
}
