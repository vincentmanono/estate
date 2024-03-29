<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeasesTable extends Migration
{ 
    /**
     * Run the migrations.
     *
     *$table->foreign('')->references('')->on('')->onDelete('');
     * @return void
     */
    public function up()
    {
        Schema::create('leases', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->nullable()->default(false);

            $table->string('date');
            $table->integer('user_id');
            $table->integer('unit_id');
            $table->string('file')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->string('tenantSignature')->nullable();
            $table->string('managerSignature')->nullable();
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
        Schema::dropIfExists('leases');
    }
}
