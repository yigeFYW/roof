<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
class MediaController extends Controller{
    
    public function media_add(Request $req){
        //获取到当前登录用户
        $user = Auth::user();
        $data['name'] = $user->name;
        return view('admin/media_add',$data);
    }
}
