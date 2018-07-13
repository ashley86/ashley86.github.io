<?php

namespace Lokisalle\Http\Controllers\Admin\Products;

use DB;
use Lokisalle\Product;
use Lokisalle\Http\Controllers\Controller;

class ProductsController extends Controller
{

    public function show()
    {
        $products = Product::all()->where( 'state', 'free' );

        return view('admin', [
            'appName'   =>  'Lokisalle',
            'products'  =>  $products,
//            'rooms'  =>  $rooms
        ]);
    }

    /*public function rooms()
    {
        return $this->belongsTo('Lokisalle\Rooms');
    }*/

    public function details( $id )
    {
//        const APP_NAME = 'LokiSalle';

        $product = Product::find( $id );

        return view('products.details', compact( 'product' ));
//        return $product;
    }
}
