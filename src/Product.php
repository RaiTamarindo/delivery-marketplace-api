<?php

namespace JampApp;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'barcode', 'name', 'description'
    ];

    public function stores() {
        return $this->hasMany('JampApp\StoreProduct');
    }

}
