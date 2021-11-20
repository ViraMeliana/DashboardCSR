<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalysisProcessMethodPivotTable extends Migration
{
    public function up()
    {
        Schema::create('analysis_process_method', function (Blueprint $table) {
            $table->unsignedBigInteger('analysis_process_id');
            $table->foreign('analysis_process_id', 'analysis_process_id_fk_5335328')->references('id')->on('analysis_processes')->onDelete('cascade');
            $table->unsignedBigInteger('method_id');
            $table->foreign('method_id', 'method_id_fk_5335328')->references('id')->on('methods')->onDelete('cascade');
        });
    }
}
