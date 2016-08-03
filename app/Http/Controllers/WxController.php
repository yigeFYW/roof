<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AccountModel;
class WxController extends Controller
{
    public $pz = null;
    //微信验证
    public function server($uid){
        //从数据库查出对应的微信配置
        //$pz = AccountModel::where('uid',$uid)->first(['aid','acc_appid','acc_secret','acc_aeskey','acc_token']);

        $pz = AccountModel::find($uid);
        $this->$pz = $pz;
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
                    $result = $this->responseText($message);
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
            return $result;
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
        return new \EasyWeChat\Message\Text(['content' => '您好！欢迎关注!']);
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
