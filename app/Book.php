<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function presentPrice(){
        return "$".sprintf('%01.2f',$this->Price);
    }
}
