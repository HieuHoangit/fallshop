<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = "comment";

    //1 commnent thuc 1 product
    public function Product(){
        return $this->BeLongsTo('App\Product','idProduct','id');
    }
    //1 comnmet co 1 user viet
    public function User(){
        return $this->BeLongsTo('App\User','idUser','id');
    }
}
