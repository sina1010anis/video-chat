<?php


namespace App\Repository\Token;


use App\Mail\Token;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class NewToken implements TokenInterface
{
    protected $token;
    protected $status = false;

    // یک کد رندم میسازه با استفاده از Str
    public function code(int $number)
    {
        $this->token = Str::random($number);
        return $this;
    }
    // سیشن های مورد نظر رو میسازه که یکی میشه اون توکنی که میفرسته که باستفقاده از متدد کد ساهخته شده و یک سیشن دیگه هم میسازه برای منقضی کردن کد
    public function setSession()
    {
        //Session::put();
        session()->put('key_token' , $this->token);
        session()->put('time_out' , time());
        $this->status = true;
        return $this;
    }
    // توی این متد اول برسی میشه که ایا سیشن ها ساختهشده و اصلا همچین سیشن ها وجود داره یا نه
    public function hasSession(string $route)
    {
        if ($this->status) {
            if (session()->has('key_token') && session()->has('time_out')) {
                return $this->backTo($route);
            }
        }
    }
    // این متد یک کاربر رو ارسال میکنه
    public function backTo(string $route)
    {
        return redirect()->route($route);
    }
    // ای مت برای برای ارسال ایمیل کابرد داره
    public function sendMail(string $mail)
    {
        Mail::to($mail)->send(new Token($this->token));
        return $this;
    }
}
