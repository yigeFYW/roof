<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nette\Mail\Message;
use Nette\Mail\SmtpMailer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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


}
