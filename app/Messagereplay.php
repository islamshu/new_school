<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messagereplay extends Model
{
    public function user()
    {
        return $this->hasOne(Father::class,'father_id','user_id');
    }
    public function message()
    {
        return $this->belongTo(Fathermessage::class);
    }
}
