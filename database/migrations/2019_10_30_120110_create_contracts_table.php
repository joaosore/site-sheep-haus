<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('property_id')->nullable();
            $table->string('locator_id')->nullable();
            $table->string('tenant_id')->nullable();
            $table->enum('tenant_interest', ['true', 'false'])->default('false');
            $table->string('locator_pdf')->nullable();
            $table->string('tenant_pdf')->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
