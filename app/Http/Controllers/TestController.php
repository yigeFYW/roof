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
        //use App\Http\Controllers\PHPMailer;
        
        function smtp_mail ( $sendto_email, $subject, $body, $extra_hdrs, $user_name) {
            $mail = new PHPMailer();
            $mail->IsSMTP(); // send via SMTP
            $mail->Host = "smtp.163.com"; // SMTP servers
            $mail->SMTPAuth = true; // turn on SMTP authentication
            $mail->Username = "lllsssvvv"; // SMTP username 注意：普通邮件认证不需要加 @域名
            $mail->Password = "a137993132"; // SMTP password

            $mail->From = "lllsssvvv@163.com"; // 发件人邮箱
            $mail->FromName = "宁夏E营销管理员"; // 发件人

            $mail->CharSet = "UTF8"; // 这里指定字符集！
            $mail->Encoding = "base64";

            $mail->AddAddress($sendto_email,"username"); // 收件人邮箱和姓名
            $mail->AddReplyTo("1015517471@qq.com","哈喽");

//$mail->WordWrap = 50; // set word wrap
//$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");
            $mail->IsHTML(true); // send as HTML
// 邮件主题
            $mail->Subject = $subject;
// 邮件内容
            $mail->Body = ' 
<html><head> 
<meta http-equiv="Content-Language" content="zh-cn"> 
<meta http-equiv="Content-Type" content="text/html; charset=GB2312"></head> 
<body> 
欢迎来到<a href="http://www.cgsir.com">http://www.cgsir.com</a> <br /><br /> 
感谢您注册为本站会员！<br /><br /> 
</body> 
</html> 
';

            $mail->AltBody ="text/html";
            if(!$mail->Send())
            {
                echo "邮件发送有误 <p>";
                echo "邮件错误信息: " . $mail->ErrorInfo;
                exit;
            }
            else {
                echo "$user_name 邮件发送成功!<br />";
            }
        }

// 参数说明(发送到, 邮件主题, 邮件内容, 附加信息, 用户名)
        smtp_mail('1015517471@qq.com', '欢迎来到cgsir.com！', 'NULL', 'cgsir.com', '宁夏E营销');
    }
}
