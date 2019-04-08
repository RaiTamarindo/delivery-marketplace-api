<?php

namespace JumpApp;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name', 'image', 'latitude', 'longitude'
    ];

    public function products() {
        return $this->hasMany('JumpApp\StoreProduct');
    }

    public function user() {
        return $this->belongsTo('JumpApp\User');
    }

}
