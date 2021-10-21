<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded =[];
    
    
    public function student()
    {
        return $this->belongsTo('App\Student');
    }
    
    
}
