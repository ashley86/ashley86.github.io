<?php

namespace Lokisalle\Http\Controllers;

use DB;
use Lokisalle\Products;

class ProductsController extends Controller
{

    public function show()
    {

//        $products = DB::table( 'products' )->where( 'state', 'free' )->get();
        $products = Products::all()->where( 'state', 'free' );
//        $rooms = $products->room()->get();

        return view('admin', [
            'appName'   =>  'Lokisalle',
            'products'  =>  $products,
//            'rooms'  =>  $rooms
        ]);
    }

//    public function rooms()
//    {
//        return $this->belongsTo('Lokisalle\Rooms');
//    }
}
