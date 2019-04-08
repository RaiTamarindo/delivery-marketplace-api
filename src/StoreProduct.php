<?php

namespace JumpApp;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreProduct extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'price', 'is_available'
    ];

    public function store() {
        return $this->belongsTo('JumpApp\Store');
    }

    public function product() {
        return $this->belongsTo('JumpApp\Product');
    }

}
