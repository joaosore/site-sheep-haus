<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->nullable();

            $table->string('name')->nullable();
            $table->text('description')->nullable();

            $table->string('characteristics_id')->nullable();
            $table->string('number_of_bedrooms')->nullable();
            $table->string('number_of_bathrooms')->nullable();
            $table->string('number_of_residents')->nullable();
            $table->string('property_size')->nullable();

            $table->string('address')->nullable();
            $table->string('cep')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('number')->nullable();
            $table->string('country')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
   
            $table->string('habits_id')->nullable();
            $table->string('user_id')->nullable();

            $table->string('caucao')->nullable();
            $table->string('mensalidade')->nullable();
            $table->string('data_vencimento')->nullable();

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
        Schema::dropIfExists('properties');
    }
}
