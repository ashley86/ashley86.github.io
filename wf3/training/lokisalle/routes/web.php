<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::group
(
    [
        'middleware' => ['web']
    ],
    function()
    {

        /**
         * Homepage
         */
        Route::get(
            '/',
            [
                'as' => 'home',
                function () {
                    return "Bienvenue sur la page d'accueil";
                }
            ]
        );



        /**
         * Admin
         */
        Route::group(
            [
                'prefix' => 'admin',
                'as' => 'admin::',
                'namespace' => 'Admin'
            ],
            function()
            {
                Route::get
                (
                    '/',
                    [
                        'as' => 'home',
                        function () {
                            return view('admin.index');
                        }
                    ]
                );

                /**
                 * Rooms
                 */
                Route::group(
                    [
                        'prefix' => 'rooms',
                        'as' => 'rooms::',
                        'namespace' => 'Rooms'
                    ],
                    function()
                    {
                        Route::get('/', ['as' => 'home', 'uses' => 'RoomsController@show']);

                        Route::get('add', ['as' => 'add', 'uses' => 'RoomsController@store']);
                        Route::post('add', ['as' => 'add_store', 'uses' => 'RoomsController@store']);

                        Route::get('{id}', ['as' => 'single', 'uses' => 'RoomsController@details']);
                    }
                );

                /**
                 * Products
                 */
                Route::group(
                    [
                        'prefix' => 'products',
                        'as' => 'products::',
                        'namespace' => 'Products'
                    ],
                    function()
                    {
                        Route::get('/', ['as' => 'home', 'uses' => 'ProductsController@show']);

                        Route::get('add', ['as' => 'add', 'uses' => 'ProductsController@show']);
                        Route::post('add', ['as' => 'add_store', 'uses' => 'ProductsController@show']);

                        Route::get('{id}', ['as' => 'single', 'uses' => 'ProductsController@details']);
                    }
                );
            }
        );
    }
);
Auth::routes();

Route::get('/home', 'HomeController@index');
