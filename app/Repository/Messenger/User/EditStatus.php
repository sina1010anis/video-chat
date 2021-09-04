<?php


namespace App\Repository\Messenger\User;


use App\Models\User;
use Carbon\Carbon;

class EditStatus implements EditStatusInterface
{
    public static function edit($status)
    {
        $user = User::query()->find(auth()->user()->id);
        switch ($status){
            case 'online':
                $user->update(['status' => 1]);
                break;
            case 'offline':
                $user->update(['status' => 0]);
                break;
        }
    }
    public function get(){
        return User::find(auth()->user()->id)->first('name');
    }
    public function time_now(){
        return Carbon::now();
    }
}
