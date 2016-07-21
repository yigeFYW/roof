<?php

namespace App\Http\Middleware;

use Closure;
use Nette\Mail\Message;
use Nette\Mail\SmtpMailer;
class EmailMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $rs = $next($request);
        $mail = new Message;
        $mail->setFrom('John <john@example.com>')
            ->addTo('peter@example.com')
            ->addTo('jack@example.com')
            ->setSubject('Order Confirmation')
            ->setBody("Hello, Your order has been accepted.");
        $mailer = new SmtpMailer([
            'host' => 'smtp.gmail.com',
            'username' => 'john@gmail.com',
            'password' => '*****',
            'secure' => 'ssl',
        ]);
        $mailer->send($mail);
        return $rs;
    }
}
