<?php

namespace App\Http\Controllers;

use App\Keyword;
use App\Mir_text;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AccountModel;
use Overtrue\Socialite\User;
use Illuminate\Support\Facades\DB;

class WxController extends Controller
{

    public $acc = null;
    //微信验证
    public function server($uid){
        //从数据库查出对应的微信配置
        //$pz = AccountModel::where('uid',$uid)->first(['aid','acc_appid','acc_secret','acc_aeskey','acc_token']);

        $pz = AccountModel::find($uid);
        $this->acc = $pz;
        $options = [
                /**
                 * Debug 模式，bool 值：true/false
                 *
                 * 当值为 false 时，所有的日志都不会记录
                 */
                'debug'  => false,
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
        $wechat = $app->server;
        $wechat->setMessageHandler(function ($message) {
            switch ($message->MsgType) {
                case 'event':
                    //关注信息
                    if($message->MsgType['event'] == 'subscribe'){

                        break;
                    }else if($message->MsgType['event'] == 'unsubscribe'){

                        break;
                    }
                    if($message->MsgType['event'] == '1'){

                        break;
                    }
                    break;
                case 'text':
                    # 文字消息...
                    //判断关键字
                    $keyword = $message->Content;
                    //判断是否为验证信息关键字
                    if($keyword == $this->acc->rep && $this->acc->rep_status == 0){
                        $acc = AccountModel::find($this->acc->aid);
                        $acc->rep_status = 1;
                        $acc->rep = '';
                        $acc->save();
                        //找到该用户,将用户的status改为3
                        DB::table('users')->where('uid',$acc->uid)->update(['status'=>3]);
                        return new \EasyWeChat\Message\Text(['content' => '您的公众号已验证通过,请退出重新登录!']);
                    }
                    //查出此公众号设置的关键字回复
                    $aid = $this->acc->aid;
                    $arr = Keyword::where(['aid'=>$aid])->get();
                    $mid = 0;
                    $rescat = 0;
                    foreach($arr as $k=>$v){
                        if($v['word'] == $keyword){
                            $mid = $arr[$k]['mid'];
                            $rescat = $arr[$k]['rescat'];
                        }
                    }
                    //如果两个参数都为0   则表示没有匹配到关键字  回复默认信息
                    if($mid == 0 || $rescat == 0){
                        //回复默认消息[您好!欢迎关注+公众号名称]
                        return new \EasyWeChat\Message\Text(['content' => '您好！欢迎关注'.$this->acc->acc_name.'!']);
                    }
                    //匹配到关键字 则查出相应关键字
                    switch ($rescat){
                        case 1://回复文本消息
                            $con = Mir_text::find($mid)->content;
                            return new \EasyWeChat\Message\Text(['content' => $con]);
                        break;
                        case 2://回复图片消息

                        break;
                    }
                    //$result = $this->responseText($message);
                    break;
                case 'image':
                    # 图片消息...
                    break;
                case 'voice':
                    # 语音消息...
                    break;
                case 'video':
                    # 视频消息...
                    break;
                case 'location':
                    # 坐标消息...
                    break;
                case 'link':
                    # 链接消息...
                    break;
                // ... 其它消息
                default:
                    # code...
                    break;
            }
            //return $result;
        });
        return $wechat->serve();
    }

    public function responseText($message){
        $new1 =  new \EasyWeChat\Message\News([
            'title'       => "haha",
            'description' => '...',
            'url'         => '',
            'image'       => "",
            // ...
        ]);
        $new2 =  new \EasyWeChat\Message\News([
            'title'       => "haha",
            'description' => '...',
            'url'         => '',
            'image'       => "",
            // ...
        ]);
        return [$new1];
        //return new \EasyWeChat\Message\Text(['content' => '您好！欢迎关注!']);
    }

    public function delmenu($uid = 1){
        $pz = AccountModel::where('uid',$uid)->first(['acc_appid','acc_secret','acc_aeskey','acc_token']);
        $options = [
            /**
             * Debug 模式，bool 值：true/false
             *
             * 当值为 false 时，所有的日志都不会记录
             */
            'debug'  => false,
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
        $rs = $app->menu->destroy();
        print_r($rs);
    }
}
