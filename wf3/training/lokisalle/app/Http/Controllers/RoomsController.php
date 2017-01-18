<?php

namespace Lokisalle\Http\Controllers;

use Illuminate\Http\Request;

use DB;


class RoomsController extends Controller
{
    public function products()
    {
        return $this->belongsTo(Products::class);
    }
}
