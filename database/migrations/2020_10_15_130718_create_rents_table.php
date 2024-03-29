<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->dateTime('paid_date')->nullable();
            $table->dateTime('expiry_date')->nullable();
            $table->string('description')->nullable();
            $table->integer('user_id')->unsigned()->nullable() ;
            $table->integer('unit_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
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
        Schema::dropIfExists('rents');
    }
}
