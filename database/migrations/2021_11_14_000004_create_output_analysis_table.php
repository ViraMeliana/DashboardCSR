<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutputAnalysisTable extends Migration
{
    public function up()
    {
        Schema::create('output_analysis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('output');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
