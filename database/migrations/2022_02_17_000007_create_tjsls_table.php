<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTjslsTable extends Migration
{
    public function up()
    {
        Schema::create('tjsls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('periode')->nullable();
            $table->string('category')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
