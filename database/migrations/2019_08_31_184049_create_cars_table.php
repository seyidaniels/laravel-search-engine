<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("Name");
            $table->decimal("Miles_per_Gallon")->nullable();
            $table->integer("Cylinders")->nullable();
            $table->integer("Displacement")->nullable();
            $table->integer("Horsepower")->nullable();
            $table->integer("Weight_in_lbs")->nullable();
            $table->decimal("Acceleration")->nullable();
            $table->date("Year")->nullable();
            $table->string("Origin")->nullable();
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
        Schema::dropIfExists('cars');
    }
}
