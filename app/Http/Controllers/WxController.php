<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AccountModel;
class WxController extends Controller
{
    //微信验证
    public function server($uid){
        //从数据库查出对应的微信配置
        $pz = AccountModel::where('uid',$uid)->first(['acc_appid','acc_secret','acc_aeskey','acc_token']);
        $options = [
                /**
                 * Debug 模式，bool 值：true/false
                 *
                 * 当值为 false 时，所有的日志都不会记录
                 */
                'debug'  => true,
                /**
                 * 账号基本信息，请从微信公众平台/开放平台获取
                 */
                'app_id'  => $pz['acc_appid'],   // AppID
                'secret'  => $pz['acc_secret'],  // AppSecret
                'token'   => $pz['acc_token'],   // Token
                'aes_key' => $pz['acc_aeskey'],  // EncodingAESKey，安全模式下请一定要填写！！！
                /**
                 * 日志配置
                 *
                 * level: 日志级别, 可选为：
                 *         debug/info/notice/warning/error/critical/alert/emergency
                 * file：日志文件位置(绝对路径!!!)，要求可写权限
                 */
                'log' => [
                    'level' => 'debug',
                    'file'  => '/tmp/easywechat.log',
                ],
        ];
        $app = new Application($options);


        $wechat = app('wechat');
        //$wechat->server->appId = 'sss';
        //dd($app->server);
        $wechat->server->setMessageHandler(function($message){
            return "欢迎关注 laravel！";
        });


        return $wechat->server->serve();
    }
}
