<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessengerController extends Controller
{
    public function app()
    {
        User::find(auth()->user()->id)->update(['status' => 1]);
        $status = false;
        if (\request()->has('user')){
            $status = true;
            $name = \request()->get('user');
            $user = User::whereName($name)->first();
            $comments = Comment::
                where(['sender' => auth()->user()->id , 'getter' => $user->id])
                ->orWhere('sender' , $user->id)
                ->where('getter' ,auth()->user()->id)
                ->orderBy('id' , 'DESC')
                ->get();
            return view('messenger' , compact('comments' , 'status'));
        }
        return view('messenger' , compact('status'));
    }

    public function searchUser(Request $request)
    {

    }

    public function checkStatus()
    {
        $user = '';
        $datas = User::where('id' , '!=' , auth()->user()->id)->get();
        foreach($datas as $data){
            if ($data->status == 1){
                $status = '<span class="online fl-right"></span>';
            }else{
                $status = '<span class="offline fl-right"></span>';
            }
            $user.='<li  class="set-font f-12 color-b-900"><a href="?user='.$data->name.'" class="color-b-700">'.$data->name.'</a>'.$status.'</li>';
        }
        return $user;
    }

    public function checkStatusMy()
    {
        if (session()->has('user online '.auth()->user()->id)){
            User::find(auth()->user()->id)->update(['status' => 1]);
        }else{
            User::find(auth()->user()->id)->update(['status' => 0]);
        }
    }

    public function offlineUser()
    {
        User::find(auth()->user()->id)->update(['status' => 0]);
        return 'ok';
    }
}
