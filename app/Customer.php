<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   
     protected $table = "customer";
      public function bill(){
        return $this->HasMany('App\Bill','id_customer','id');
     }
     
}
