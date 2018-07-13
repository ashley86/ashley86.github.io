<?php

namespace Lokisalle;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function room()
    {
        return $this->belongsTo( Room::class );
    }
}
