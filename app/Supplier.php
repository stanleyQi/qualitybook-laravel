<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "suppliers";

    public function books()
    {
        return $this->hasMany('App\Book', 'supplier_id', 'id');
    }
}
