<?php

namespace App\Http\Controllers\Custromer;

use App\AccountModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
class CusController extends Controller
{
    //登录成功 根据用户状态 进行路由分发
    public function index(Request $req){

        $users = User::find($req->user()->uid);
        $users->lastlogin = time();
        $users->save();
        $status = $users->status;
        if($status == 0){
            //用户没有配置公众号
            return redirect('cus/start');
        }else{
            //用户已配置公众号
            return redirect('welcome');
        }
    }

    public function start(Request $req){
        $users = User::find($req->user()->uid);
        $data['user'] = $users;
        return view('customer/start',$data);
    }

    public function enable(Request $req){
        $users = User::find($req->user()->uid);
        $data['user'] = $users;

        return view('customer/enable',$data);
    }

    public function postenable(Request $req){
        //验证信息

        $acc = new AccountModel();
        $acc->uid = $req->user()->uid;
        $acc->acc_name = $req->wechat_name;
        $acc->acc_id = $req->wechat_id;
        $acc->acc_cat = $req->wechat_cat;
        $acc->acc_wechat = $req->wechat_num;
        $acc->acc_appid = $req->appid;
        $acc->acc_appsecret = $req->secret;
        $acc->acc_aeskey = $req->appaeskey;
        $acc->regtime = time();
        $rs = $acc->save();
        if($rs){
            return redirect('welcome');
        }
    }

    public function welcome(Request $req){
        $users = User::find($req->user()->uid);
        $data['user'] = $users;
        //根据用户id取公众号信息
        $acc = AccountModel::where('uid',$req->user()->uid)->first();
        //随机生成token
        $token = $this->shufflestr();
        $acc->acc_token = $token;
        $rs = $acc->save();
        if($rs){
            $data['token'] = $token;
            $data['name'] = $acc->acc_wechat;
            //生成配置URL
            $data['url'] = "http://".$_SERVER['SERVER_NAME'].'/wechat/'.$rs;
            return view('customer/welcome',$data);
        }else{
            return '数据库出错!';
        }
    }

    //生成随机数
    public function shufflestr($length = 20){
        $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        return substr(str_shuffle($str),0,$length);
    }
}
