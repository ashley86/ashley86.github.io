<?php

namespace Lokisalle\Http\Controllers;

use DB;

class ProductsController extends Controller
{

    public function show()
    {

        $products = DB::table( 'products' )->where('etat','libre')->get();

        return view('admin', [
            'appName'   =>  'Lokisalle',
            'products'  =>  $products
        ]);
    }

    public function rooms()
    {
        return $this->belongsTo('Lokisalle\Rooms');
    }
}
