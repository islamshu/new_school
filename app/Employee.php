<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
        protected $guarded=[];
        
  public function git_branch(){
      
      $branch = $this->branch_id;
    //   dd($branch);
      if($branch == 1){
          return 'عبري';
      }elseif($branch == 2){
          return ' عبري 2';
      }elseif($branch == 3){
          return 'المعبيلة';
      }elseif($branch == 4){
     return 'المعبيلة حلقة(1-4)';
      }elseif($branch == 5){
          return 'الهيال';
      }else{
               return 'الموالح';
      }
  }

}
