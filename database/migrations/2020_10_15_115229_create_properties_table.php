<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     * $table->string('')->nullable();
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');//residential/commercial/service_resident
            $table->string('date_of_cert_of_occupation')->nullable();
            $table->string('address');
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->string('year_of_construction')->nullable();
            $table->string('water_bill_rate')->nullable();

            $table->dateTime('actual_rent_date')->nullable();

            $table->string('l_r_no')->nullable();
            $table->integer('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

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
