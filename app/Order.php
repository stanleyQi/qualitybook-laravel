<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','status'];
    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function books(){
        return $this->belongsTo('App\Book')->withPivot('quantity');
    }
}
