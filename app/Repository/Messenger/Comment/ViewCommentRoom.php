<?php


namespace App\Repository\Messenger\Comment;


use App\Models\Comment;

class ViewCommentRoom
{
    public function viewComment($user)
    {
        return Comment::
        where(['sender' => auth()->user()->id , 'getter' => $user->id])
            ->orWhere('sender' , $user->id)
            ->where('getter' ,auth()->user()->id)
            ->orderBy('id' , 'ASC')
            ->get();
    }
}
