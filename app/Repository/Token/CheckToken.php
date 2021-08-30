<?php


namespace App\Repository\Token;


interface CheckToken
{
    public function hasSession();
    public function timeoutSession();
    public function checkSession(string $code , string $route);
}
