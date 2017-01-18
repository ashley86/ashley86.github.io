<?php

namespace Lokisalle;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    public function products()
    {
        return $this->hasMany( Products::class );
    }
}
