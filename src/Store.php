<?php

namespace JampApp;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name', 'image', 'latitude', 'longitude'
    ];

    public function products() {
        return $this->hasMany('JampApp\StoreProduct');
    }

    public function user() {
        return $this->belongsTo('JampApp\User');
    }

}
