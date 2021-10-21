<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    protected $guarded =[];
    
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
    
}
