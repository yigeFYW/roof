<?php

namespace App\Http\Controllers\Custromer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
class CusController extends Controller
{

    public function index(Request $req){
        $users = User::find($req->user()->uid);
        $users->lastlogin = time();
        $users->save();

        
    }

    public function start(){

        return view('customer/start');
    }

    public function enable(){
        return view('customer/enable');
    }
}
