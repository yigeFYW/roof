<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Nette\Mail\Message;
use Nette\Mail\SmtpMailer;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Encryption\DecryptException;
class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $mail = new Message;
        $mail->setFrom('一个放羊娃 <lllsssvvv@163.com>')
            ->addTo('1015517471@qq.com')
            ->setSubject('华城国际邀请您来面试！')
            ->setHTMLBody("<h1>你好，华城国际邀请您来面试！</h1>");

        $mailer = new SmtpMailer([
            'host' => 'smtp.163.com',
            'username' => 'lllsssvvv@163.com',
            'password' => 'a137993132',
            'secure' => 'ssl',
        ]);
        $mailer->send($mail);
        
    }

    public function in($id,$str){
        $user = User::find($id);
        if($user){

            $str = Crypt::encrypt($str);
            echo $str;
            echo '<br>',strlen($str);
            $str = Crypt::decrypt($str);
            echo $str;
            dd($user);
        }
    }
    
    /**
     * 
     * 
     */
    public function testmail($id){
        $id = Crypt::decrypt($id);
        
        
    }
}
