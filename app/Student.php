<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
protected $guarded=[];
   public function pils()
    {
        return $this->hasMany(Studentpain::class, 'student_id');
    }
     public function count_bils(){
        return $this->pils->where('status',0)->count();
     }
}
