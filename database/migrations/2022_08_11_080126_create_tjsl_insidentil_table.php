<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTjslInsidentilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tjsl_insidentils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('periode')->nullable();
            $table->string('rka')->nullable();
            $table->string('cash_out')->nullable();
            $table->string('commited')->nullable();
            $table->string('realization')->nullable();
            $table->string('category')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

}
