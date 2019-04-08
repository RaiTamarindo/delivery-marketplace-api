<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name', 'image', 'latitude', 'longitude'
    ];

    public function products() {
        return $this->hasMany('App\StoreProduct');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

}
