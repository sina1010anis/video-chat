<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $user = \App\Models\User::all();
        return (new UserCollection($user));
    }
}
