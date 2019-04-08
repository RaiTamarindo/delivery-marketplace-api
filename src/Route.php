<?php

namespace JumpApp;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{

    protected $fillable = [
        'distance', 'is_straight_line'
    ];

    public function address() {
        return $this->belongsTo('JumpApp\Address');
    }

    public function store() {
        return $this->belongsTo('JumpApp\Store');
    }

}
