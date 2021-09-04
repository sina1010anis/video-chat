<?php


namespace App\Repository\Messenger\User;


class URL_GET
{
    public function get_url_user($status){
        switch ($status){
            case 'has':
                return \request()->has('user');
                break;
            case 'get':
                return \request()->get('user');
                break;
        }
    }
}
