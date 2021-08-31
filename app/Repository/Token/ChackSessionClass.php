<?php


namespace App\Repository\Token;


class ChackSessionClass implements CheckToken
{
    protected $status = false;
    protected $timeout = false;
    public function hasSession()
    {
        if (session()->has('key_token')){
            $this->status = true;
        }
        return $this;
    }

    public function checkSession(string $code ,string $route)
    {
        if ($this->status && $code == session()->get('key_token') && session()->get('time_out') - time() >= -60){
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
