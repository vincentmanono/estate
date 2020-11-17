<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWatersTable extends Migration
{
    /**
     * Run the migrations.
     * $table->foreign('')->references('')->on('')->onDelete('');
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waters', function (Blueprint $table) {
            $table->id();
            $table->string('amount')->default(0);
            $table->string('pay_date')->nullable();
            $table->string('read_date')->nullable();
            $table->boolean('paid')->nullable()->default(false);
            $table->double('previous_reading', 15, 8)->nullable();
            $table->double('new_reading', 15, 8)->nullable();
            $table->integer('unit_id');
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
        Schema::dropIfExists('waters');
    }
}
