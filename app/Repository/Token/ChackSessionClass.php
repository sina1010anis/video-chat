<?php


namespace App\Repository\Token;


class ChackSessionClass implements CheckToken
{
    protected $status = false;
    protected $timeout = false;
    public function timeoutSession(){
        if (!jdate()->getTimestamp() + 60){
            $this->timeout = true;
        }else{
            $this->timeout = false;
        }
        return $this;
    }
    public function hasSession()
    {
        if ($this->timeout && session()->has('key_token')){
            $this->status = true;
        }
        return $this;
    }

    public function checkSession(string $code ,string $route)
    {
        if ($this->status && $code == session()->get('key_token')){
            return 'Ok Token';
        }else{
            session()->forget('key_token');
            $this->backTo($route);
        }
    }

    public function backTo($route)
    {
        return redirect()->route($route);
    }
}
