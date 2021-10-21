<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Father extends Authenticatable
{
    use Notifiable;

    protected $guarded =[];
    public function user()
    {
        return $this->hasOne(User::class);
    }
    /**
     * Get all of the comments for the Father
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    
}
