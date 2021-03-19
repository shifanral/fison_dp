<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    public function variant()
    {
        return $this->hasMany('App\Variant');
    }
}
