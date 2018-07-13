<?php

namespace Lokisalle;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['title', 'description', 'country', 'city', 'address', 'postal_code', 'capacity', 'category'];

    public function product()
    {
        return $this->hasMany( Product::class );
    }
}
