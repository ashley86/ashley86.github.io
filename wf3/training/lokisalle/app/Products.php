<?php

namespace Lokisalle;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function rooms()
    {
        return $this->hasMany( Rooms::class );
    }
}
