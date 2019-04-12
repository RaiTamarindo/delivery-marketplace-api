<?php

namespace JampApp;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $fillable = [
        'zipcode', 'city', 'district', 'street', 'building_number', 'latitude', 'longitude'
    ];

    public function user() {
        return $this->belongsTo('JampApp\User');
    }

    public function routes() {
        return $this->hasMany('JampApp\Route');
    }

}
