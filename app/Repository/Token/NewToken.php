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

    public function code(int $number)
    {
        $this->token = Str::random($number);
        return $this;
    }

    public function setSession()
    {
        //Session::put();
        session()->put('key_token' , $this->token);
        $this->status = true;
        return $this;
    }

    public function hasSession(string $route)
    {
        if ($this->status) {
            if (session()->has('key_token')) {
                return $this->backTo($route);
            }
        }
    }

    public function backTo(string $route)
    {
        return redirect()->route($route);
    }

    public function sendMail(string $mail)
    {
        Mail::to($mail)->send(new Token($this->token));
        return $this;
    }
}
