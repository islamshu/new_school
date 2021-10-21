<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->string('first_menu')->nullable();
            $table->string('secand_menu')->nullable();
            $table->string('third_menu')->nullable();
            $table->string('fourth_menu')->nullable();
            $table->string('five_menu')->nullable();
            $table->string('six_menu')->nullable();
            $table->string('first_socail')->nullable();
            $table->string('secand_socail')->nullable();
            $table->string('third_socail')->nullable();
            $table->string('fourth_socail')->nullable();
            $table->longText('description')->nullable();
            $table->string('first_sec_title')->nullable();
            $table->string('first_sec_link')->nullable();
            $table->string('first_sec_link_title')->nullable();
            $table->string('secand_sec_title')->nullable();
            $table->string('third_sec_title')->nullable();
            $table->string('four_sec_title')->nullable();
            $table->string('four_sec_link')->nullable();
            $table->string('four_sec_link_title')->nullable();
            $table->string('develop_by')->nullable();




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
        Schema::dropIfExists('generals');
    }
}
