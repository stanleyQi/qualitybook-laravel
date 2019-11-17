<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

define('TAX_RATE',0.15);

class Book extends Model
{
    public function categories(){
        return $this->belongsToMany('App\Category');
    }

    public function supplier()
    {
        $supplier = $this->belongsTo('App\Supplier');
        return $this->belongsTo('App\Supplier');
    }

    public function presentPrice(){
        return "$".sprintf('%01.2f',$this->Price);
    }

    public function presentTax(){
        return "$".sprintf('%01.2f',($this->Price)*TAX_RATE);
    }

    public function presentSubtotal(){
        return "$".sprintf('%01.2f',($this->Price)*(1+TAX_RATE));
    }
}
