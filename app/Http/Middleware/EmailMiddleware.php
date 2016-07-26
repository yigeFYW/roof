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
        $mail->setFrom( env('SMTP_NAME') .'<'.env('SMTP_USERNAME').'>')
            ->addTo('peter@example.com')
            ->addTo('jack@example.com')
            ->setSubject('Order Confirmation')
            ->setBody("Hello, Your order has been accepted.");
        $mailer = new SmtpMailer([
            'host' => env('SMTP_HOST'),
            'username' => env('SMTP_USERNAME'),
            'password' => env('SMTP_PWD'),
            'secure' => 'ssl',
        ]);
        $mailer->send($mail);
        return $rs;
    }
}
