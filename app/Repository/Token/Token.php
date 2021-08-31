<?php


namespace App\Repository\Token;


class Token
{
    public static function make($class){
        switch ($class){
            case 'NewToken':
                return new NewToken();
                break;
            case 'CheckSession':
                return new ChackSessionClass();
                break;
        }
    }
}
