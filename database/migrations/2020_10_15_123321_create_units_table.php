<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100)->nullable();

            // $table->string('rent_escalation')->nullable();
            // $table->string('water_meter')->nullable();
            $table->string('billing_cycle')->nullable();//monthy,quartely,bi-annually,annually
            $table->string('water_acc_no')->nullable();
            // $table->string('electricity_meter')->nullable();//prepaid and post-paid
            $table->string('electricity_acc_no')->nullable();
            $table->string('service_charge')->nullable();
            // $table->string('management_fee')->nullable();
            $table->integer('property_id');
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
        Schema::dropIfExists('units');
    }
}
