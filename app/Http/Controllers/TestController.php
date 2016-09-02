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
        $mail = new Message;
        $mail->setFrom('华城国际 <lllsssvvv@163.com>')
            ->addTo('1015517471@qq.com')
            ->setSubject('华城国际邀请您来面试')
            ->setBody("您好，黄河，我们是华城国际，邀请您来面试哦！");
        //$mail->setHTMLBody('<b>Sample HTML</b> <img src="background.gif">');
        //$mail->addEmbeddedFile('favicon.ico');
        $mail->addAttachment('example.zip');
        $mailer = new SmtpMailer([
            'host' => 'smtp.163.com',
            'username' => 'lllsssvvv@163.com',
            'password' => 'a137993132',
            'secure' => 'ssl',
        ]);
        $mailer->send($mail);
    }
}
