<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'produk';
    protected $guarded = [];
    
    public function order()
    {
        return $this->hasOne('App\Order');
    }
}
