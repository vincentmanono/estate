<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->double('total_rent', 15, 8)->nullable();
            $table->double('total_service', 15, 8)->nullable();
            $table->double('taxable_amount', 15, 8)->nullable();
            $table->double('tax', 15, 8)->nullable();
            $table->integer('property_id')->unsigned()->nullable();
            $table->double('gross', 15, 8)->nullable();
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
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
        Schema::dropIfExists('taxes');
    }
}
