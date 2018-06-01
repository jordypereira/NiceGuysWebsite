<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('text')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('color')->nullable();
            $table->string('font_color')->nullable();
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
        Schema::dropIfExists('home_blocks');
    }
}
