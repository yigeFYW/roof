<?php

namespace App\Http\Controllers\Custromer;

use App\AccountModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use DB;
class CusController extends Controller
{
    protected $middleware = ['App\Http\Middleware\Authenticate'=>[]];

    /**
     * 登录成功 根据用户状态 进行路由分发
     * @status 为0 则为刚注册用户,进入提示发送邮箱验证码
     * @status 为1 则为已邮箱验证用户,进入欢迎页
     * @status 为2 则为已提交信息用户
     * @status 为3 则为绑定微信号用户
     */
    public function index(Request $req){
        $users = User::find($req->user()->uid);
        $users->lastlogin = time();
        $users->save();
        $status = $users->status;
        if($status == 0){
            //进入提示发送邮箱验证码
            $data['user'] = $users;
            return view('customer/start',$data);
        }else if($status == 1){
            //用户没有配置公众号
            return redirect('cus/start')->with('status',1);
        }else if($status == 2){
            return redirect('welcome');
        }else if($status == 3){
            return redirect('admin/index');
        }else if($status == 4){
            echo "您是超级用户!";
        }
    }

    public function start(Request $req){
        $users = User::find($req->user()->uid);
        $data['user'] = $users;
        return view('customer/start',$data);
    }

    public function enable(Request $req){
        $users = User::find($req->user()->uid);
        if($users->status == 0){
            return redirect('home');
        }
        if($users->status >= 2){
            return redirect('welcome');
        }
        $data['user'] = $users;

        return view('customer/enable',$data);
    }

    public function postenable(Request $req){
        $req->wechat_name = trim($req->wechat_name);
        $req->wechat_id = trim($req->wechat_id);
        $req->wechat_cat = trim($req->wechat_cat);
        $req->wechat_num = trim($req->wechat_num);
        $req->appid = trim($req->appid);
        $req->appsecret = trim($req->appsecret);
        $req->aeskey = trim($req->aeskey);
        //验证信息
        if(empty(trim($req->wechat_name))){
            return response()->json(['error'=>1,'msg'=>'公众号名称不能为空!','list'=>'wechat_name']);
        }
        if(mb_strlen($req->wechat_name) >= 200){
            return response()->json(['error'=>1,'msg'=>'不是正确的公众号名称!','list'=>'wechat_name']);
        }
        $pattern = "/^[0123]$/";
        if(!preg_match($pattern, $req->wechat_cat)){
            return response()->json(['error'=>2,'msg'=>'别闹,OK?','list'=>'wechat_cat']);
        }
        $pattern = "/^\w{15}$/";
        if(!preg_match($pattern, $req->wechat_id)){
            return response()->json(['error'=>3,'msg'=>'公众号原始ID格式不对哦!','list'=>'wechat_id']);
        }
        //去数据库查找原始ID是否已存在
        $res = AccountModel::where('acc_id',$req->wechat_id)->first();
        if($res){
            return response()->json(['error'=>3,'msg'=>'公众号原始ID已注册,请不要重复注册!','list'=>'wechat_id']);
        }
        if(empty(trim($req->wechat_num))){
            return response()->json(['error'=>4,'msg'=>'微信账号不能为空!','list'=>'wechat_num']);
        }
        if(mb_strlen($req->wechat_num) >= 200){
            return response()->json(['error'=>4,'msg'=>'不是正确的微信账号!','list'=>'wechat_num']);
        }
        $pattern = "/^\w{18}$/";
        if(!preg_match($pattern, $req->appid)){
            return response()->json(['error'=>5,'msg'=>'AppId格式不对哦!','list'=>'appid']);
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
        $acc = new AccountModel();
        $acc->uid = $req->user()->uid;
        $acc->acc_name = $req->wechat_name;
        $acc->acc_id = $req->wechat_id;
        $acc->acc_cat = $req->wechat_cat;
        $acc->acc_wechat = $req->wechat_num;
        $acc->acc_appid = $req->appid;
        $acc->acc_secret = $req->appsecret;
        $acc->acc_aeskey = $req->aeskey;
        $acc->regtime = time();
        $rs = $acc->save();
        if($rs){
            return response()->json(['error'=>0,'msg'=>url("welcome"),'list'=>'']);
        }
    }

    public function welcome(Request $req){
        $users = User::find($req->user()->uid);
        $data['user'] = $users->name;
        //根据用户id取公众号信息
        $acc = AccountModel::where('uid',$req->user()->uid)->first();
        if($users->status == 2){
            $data['token'] = $acc->acc_token;
            $data['name'] = $acc->acc_name;
            $data['rep'] = $acc->rep;
            $data['url'] = "http://".$_SERVER['SERVER_NAME'].'/wechat/'.$acc->aid.'.html';
            return view('customer/welcome',$data);
        }
        if($users->status == 3){
            return view('errors/503');
        }
        //随机生成token
        $token = $this->shufflestr();
        $acc->acc_token = $token;
        $rs = $acc->save();
        if($rs){
            $users->status = 2;
            $users->save();
            $data['token'] = $token;
            $data['name'] = $acc->acc_name;
            $rep = $this->shufflestr(4);
            $acc->rep = $rep;
            $acc->save();
            $data['rep'] = $rep;
            //生成配置URL
            $data['url'] = "http://".$_SERVER['SERVER_NAME'].'/wechat/'.$rs.'.html';
            return view('customer/welcome',$data);
        }else{
            return view('errors/503');
        }
    }

    //生成随机数
    public function shufflestr($length = 20){
        $str = 'abcdefghijkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ23456789';
        return substr(str_shuffle($str),0,$length);
    }

    //修改密码
    public function pwd(Request $req){
        $users = User::find($req->user()->uid);
        $data['user'] = $users;
        return view('customer/pwd',$data);
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

    public function roof(Request $req){
        $users = User::find($req->user()->uid);
        $acc = AccountModel::where('uid',$req->user()->uid)->first();
        $data['user'] = $users;
        $data['acc_list'] = $acc;
        return view('customer/roof',$data);
    }

    public function postroof(Request $req){
        $req->wechat_name = trim($req->wechat_name);
        $req->wechat_id = trim($req->wechat_id);
        $req->wechat_cat = trim($req->wechat_cat);
        $req->wechat_num = trim($req->wechat_num);
        $req->appid = trim($req->appid);
        $req->appsecret = trim($req->appsecret);
        $req->aeskey = trim($req->aeskey);
        //验证信息
        if(empty(trim($req->wechat_name))){
            return response()->json(['error'=>1,'msg'=>'公众号名称不能为空!','list'=>'wechat_name']);
        }
        if(mb_strlen($req->wechat_name) >= 200){
            return response()->json(['error'=>1,'msg'=>'不是正确的公众号名称!','list'=>'wechat_name']);
        }
        $pattern = "/^[0123]$/";
        if(!preg_match($pattern, $req->wechat_cat)){
            return response()->json(['error'=>2,'msg'=>'别闹,OK?','list'=>'wechat_cat']);
        }
        $pattern = "/^\w{15}$/";
        if(!preg_match($pattern, $req->wechat_id)){
            return response()->json(['error'=>3,'msg'=>'公众号原始ID格式不对哦!','list'=>'wechat_id']);
        }
        if(empty(trim($req->wechat_num))){
            return response()->json(['error'=>4,'msg'=>'微信账号不能为空!','list'=>'wechat_num']);
        }
        if(mb_strlen($req->wechat_num) >= 200){
            return response()->json(['error'=>4,'msg'=>'不是正确的微信账号!','list'=>'wechat_num']);
        }
        $pattern = "/^\w{18}$/";
        if(!preg_match($pattern, $req->appid)){
            return response()->json(['error'=>5,'msg'=>'AppId格式不对哦!','list'=>'appid']);
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
        $acc = AccountModel::where('uid',$req->user()->uid)->first();
        $acc->acc_name = $req->wechat_name;
        $acc->acc_id = $req->wechat_id;
        $acc->acc_cat = $req->wechat_cat;
        $acc->acc_wechat = $req->wechat_num;
        $acc->acc_appid = $req->appid;
        $acc->acc_secret = $req->appsecret;
        $acc->acc_aeskey = $req->aeskey;
        $rs = $acc->save();
        if($rs){
            return response()->json(['error'=>0,'msg'=>url("welcome"),'list'=>'']);
        }else {
            return response()->json(['error'=>10,'msg'=>"数据库出错了!"]);
        }
    }
}
