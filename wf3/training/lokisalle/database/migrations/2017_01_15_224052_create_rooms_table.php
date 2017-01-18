<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title', 200);
            $table->text('description');
            $table->string('country', 20);
            $table->string('city', 20);
            $table->string('address', 50);
            $table->integer('postal_code')->unsigned();
            $table->integer('capacity')->unsigned();
            $table->enum('category', ['reunion', 'bureau', 'formation']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
