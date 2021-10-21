<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('main_title');
            $table->longText('main_des');
            $table->string('title_1')->nullable();
            $table->string('icon_1')->nullable();
            $table->longText('des_1')->nullable();
            $table->string('title_2')->nullable();
            $table->string('icon_2')->nullable();
            $table->longText('des_2')->nullable();
            $table->string('title_3')->nullable();
            $table->string('icon_3')->nullable();
            $table->longText('des_3')->nullable();
            $table->string('title_4')->nullable();
            $table->string('icon_4')->nullable();
            $table->longText('des_4')->nullable();
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
        Schema::dropIfExists('abouts');
    }
}
