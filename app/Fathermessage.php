<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fathermessage extends Model
{
    protected $guarded =[];
    /**
     * Get all of the comments for the Fathermessage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function relpays()
    {
        return $this->hasMany(Messagereplay::class);
    }
    public function user()
    {
        return $this->hasOne(Father::class,'father_id','user_id');
    }
}
