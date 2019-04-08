<?php

namespace JumpApp;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $fillable = [
        'zipcode', 'city', 'district', 'street', 'building_number', 'latitude', 'logitude'
    ];

    public function user() {
        return $this->belongsTo('JumpApp\User');
    }

    public function routes() {
        return $this->hasMany('JumpApp\Route');
    }

}
