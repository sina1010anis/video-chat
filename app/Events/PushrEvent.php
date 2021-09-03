<?php

namespace App\Events;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class PushrEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;
    public $getter;
    public $time;
    public $user;

    public function __construct($request , $getter , $time , $user)
    {
        $this->data = $request;
        $this->getter = $getter;
        $this->time = $time;
        $this->user = $user;
    }

    public function broadcastOn()
    {
        Comment::create([
            'text' => $this->data,
            'sender' => auth()->user()->id,
            'getter' => $this->getter,
            'status' => 0
        ]);
        return (new Channel('my-channel'));
    }

    public function broadcastAs()
    {
        return 'my-event';
    }
}
