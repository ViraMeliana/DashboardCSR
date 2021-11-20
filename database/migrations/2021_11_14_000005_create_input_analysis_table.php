<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputAnalysisTable extends Migration
{
    public function up()
    {
        Schema::create('input_analysis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('input');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
