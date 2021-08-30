<?php


namespace App\Repository\Token;


interface TokenInterface
{
    public function code(int $number);
    public function setSession();
    public function hasSession(string $route);
    public function backTo(string $route);
    public function sendMail(string $mail);
}
