<?php

namespace App\Http\Controllers\Admin;

use App\AccountModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoofController extends Controller
{
    protected $middleware = ['App\Http\Middleware\Authenticate'=>[]];

    public $acc = [];
    public function cus(Request $req){
        $acc = AccountModel::where('uid',$req->user()->uid)->first();
        $data['acc_list'] = $acc;
        $data['name'] = $req->user()->name;
        //dd($data);
        return view('admin/auth_list',$data);
    }
}
