<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded =[];
    public function user_send(){
        return $this->belongsTo(User::class , 'sender' , 'id');
    }
    public function user_get(){
        return $this->belongsTo(User::class , 'getter' , 'id');
    }
}
