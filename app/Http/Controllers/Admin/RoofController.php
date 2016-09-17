<?php

namespace App\Http\Controllers\Admin;

use App\AccountModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Overtrue\Socialite\User;
use DB;
class RoofController extends Controller
{
    protected $middleware = ['App\Http\Middleware\Authenticate'=>[]];

    public $acc = [];
    public function cus(Request $req){
        $acc = AccountModel::where('uid',$req->user()->uid)->first();
        $data['acc_list'] = $acc;
        $data['name'] = $req->user()->name;
        return view('admin/auth_list',$data);
    }

    public function postcus(Request $req){
        $acc = AccountModel::where('uid',$req->user()->uid)->first();
        $req->wechat_name = trim($req->wechat_name);
        $req->wechat_num = trim($req->wechat_num);
        $req->appsecret = trim($req->appsecret);
        $req->aeskey = trim($req->aeskey);
        $req->token = trim($req->token);
        //验证信息
        if(empty(trim($req->wechat_name))){
            return response()->json(['error'=>1,'msg'=>'公众号名称不能为空!','list'=>'wechat_name']);
        }
        if(mb_strlen($req->wechat_name) >= 200){
            return response()->json(['error'=>1,'msg'=>'不是正确的公众号名称!','list'=>'wechat_name']);
        }
        if(empty(trim($req->wechat_num))){
            return response()->json(['error'=>4,'msg'=>'微信账号不能为空!','list'=>'wechat_num']);
        }
        if(mb_strlen($req->wechat_num) >= 200){
            return response()->json(['error'=>4,'msg'=>'不是正确的微信账号!','list'=>'wechat_num']);
        }
        if(mb_strlen($req->token) >=200 ){
            return response()->json(['error'=>4,'msg'=>'token过长,请填写较短的token!']);
        }
        if(strlen($req->token) <=6 ){
            return response()->json(['error'=>4,'msg'=>'token过短,请填写不少于6位的认证token']);
        }
        $pattern = "/^\w{32}$/";
        if(!preg_match($pattern, $req->appsecret)){
            return response()->json(['error'=>6,'msg'=>'AppSecret格式不对哦!','list'=>'appsecret']);
        }
        if(!empty(trim($req->aeskey))){
            $pattern = "/^\w{43}$/";
            if(!preg_match($pattern, $req->aeskey)){
                return response()->json(['error'=>7,'msg'=>'aeskey格式不对哦!','list'=>'aeskey']);
            }
        }
        $acc->acc_name = $req->wechat_name;
        $acc->acc_wechat = $req->wechat_num;
        $acc->acc_secret = $req->appsecret;
        $acc->acc_aeskey = $req->aeskey;
        $res = $acc->save();
        if($res){
            return response()->json(['error'=>0]);
        }else {
            return response()->json(['error'=>10,'msg'=>'服务器异常!']);
        }
    }

    public function pwd(Request $req){
        $acc = AccountModel::where('uid',$req->user()->uid)->first();
        $data['name'] = $req->user()->name;
        return view('admin/auth_pwd',$data);
    }

    public function postpwd(Request $req){
        //查出旧密码的hash字符串
        $pwd = $req->user()->password;
        //验证密码是否正确
        $res = Hash::check($req->pwd,$pwd);
        if($res){
            //相等的话去修改密码
            DB::table('users')->where('uid',$req->user()->uid)->update(['password'=>Hash::make($req->pwd1)]);
            return response()->json(['error'=>0]);
        }else{
            return response()->json(['error'=>1,'msg'=>'原密码不正确!']);
        }
    }
}
