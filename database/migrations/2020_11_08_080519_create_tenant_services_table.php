<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantServicesTable extends Migration
{
    /**
     * Run the migrations.
     * $table->foreign('')->references('')->on('')->onDelete('');
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant_services', function (Blueprint $table) {
            $table->id();
            $table->integer('unit_id');
            $table->integer('user_id');
            $table->string('message');
            $table->boolean('status')->nullable()->default(false);
            $table->integer('property_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
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
        Schema::dropIfExists('tenant_services');
    }
}
