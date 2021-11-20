<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalysisProcessesTable extends Migration
{
    public function up()
    {
        Schema::create('analysis_processes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
