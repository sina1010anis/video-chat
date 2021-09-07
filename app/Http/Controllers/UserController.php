<?php

namespace App\Http\Controllers;
class UserController extends Controller
{


    public function view()
    {
        //return Cache::get('user-is-online-'. 23);
        return view('user_status');
    }
}
