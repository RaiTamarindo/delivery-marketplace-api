<?php

namespace JampApp;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{

    protected $fillable = [
        'distance', 'is_straight_line'
    ];

    public function address() {
        return $this->belongsTo('JampApp\Address');
    }

    public function store() {
        return $this->belongsTo('JampApp\Store');
    }

}
