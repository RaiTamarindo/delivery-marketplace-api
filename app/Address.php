<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $fillable = [
        'zipcode', 'city', 'district', 'street', 'building_number', 'latitude', 'logitude'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function routes() {
        return $this->hasMany('App\Route');
    }

}
