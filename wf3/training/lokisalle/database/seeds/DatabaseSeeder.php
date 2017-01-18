<?php

use Illuminate\Database\Seeder;
use Lokisalle\Rooms;
use Lokisalle\Products;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call('RoomTableSeeder');
        $this->call('ProductTableSeeder');
        Model::reguard();
    }
}
