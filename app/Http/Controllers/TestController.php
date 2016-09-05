<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Nette\Mail\Message;
use Nette\Mail\SmtpMailer;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Encryption\DecryptException;
use GuzzleHttp\Middleware;
use App\Wxapi\Checkapi;
class TestController extends Controller
{
    /**
     * id&&test_mail
     * 
     */
    public function testmail($id){
        //解码
        $id = Crypt::decrypt($id);
        $arr = explode('&&',$id);
        $user = User::find($arr[0]);
        //如果没有此用户则跳到503
        if(!$user){
            return view('errors/503');
        }
        //认证字符串不对则跳转到503
        if($user->test_mail != $arr[1]){
            return view('errors/503');
        }
        //已认证用户跳转503
        if($user->status != 0){
            return view('errors/503');
        }else{
            //修改status为1
            $user->status = 1;
            $user->test_mail = '';
            $user->save();
            Auth::loginUsingId($arr[0]);
            return redirect('cus/start')->with('succ','1');
        }
    }

    public function mm(){
        $a = new Checkapi(11);
        $a->test();
    }
}
