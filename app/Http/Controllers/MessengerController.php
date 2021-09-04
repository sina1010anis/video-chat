<?php

namespace App\Http\Controllers;
use App\Events\PushrEvent;
use App\Models\User;
use App\Repository\Messenger\Comment\ViewCommentRoom;
use App\Repository\Messenger\User\EditStatus;
use App\Repository\Messenger\User\URL_GET;
use Illuminate\Http\Request;
class MessengerController extends Controller{
    public $status = false;
    protected $editStatus;
    protected $URL_GET;
    protected $viewCommentRoom;
    public function __construct(EditStatus $editStatus , URL_GET $URL_GET , ViewCommentRoom $viewCommentRoom){
        $this->editStatus = $editStatus;
        $this->URL_GET = $URL_GET;
        $this->viewCommentRoom = $viewCommentRoom;
    }
    public function app(){
        $this->editStatus::edit('online');
        if ($this->URL_GET->get_url_user('has')){
            $status = true;
            $user = User::whereName($this->URL_GET->get_url_user('get'))->first();
            return view('messenger' , compact( 'status'))->with('comments' , $this->viewCommentRoom->viewComment($user));
        }
        return view('messenger')->with('status' , $this->status);
    }
    public function checkStatus(){
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
    public function checkStatusMy(){
        if (session()->has('user online '.auth()->user()->id)){
            $this->editStatus::edit('online');
        }else{
            $this->editStatus::edit('offline');
        }
    }
    public function offlineUser(){
        $this->editStatus::edit('offline');
        return 'ok';
    }
    public function sendMessage(Request $request , $getter){
        event(new PushrEvent($request->message , $getter , $this->editStatus->time_now() , $this->editStatus->get()->name));
        return back();
    }
}
