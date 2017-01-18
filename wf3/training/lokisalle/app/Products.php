<?php

namespace Lokisalle;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function room()
    {
        return $this->belongsTo( Rooms::class );
    }
}
