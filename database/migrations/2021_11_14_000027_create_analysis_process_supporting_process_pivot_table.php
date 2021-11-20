<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalysisProcessSupportingProcessPivotTable extends Migration
{
    public function up()
    {
        Schema::create('analysis_process_supporting_process', function (Blueprint $table) {
            $table->unsignedBigInteger('analysis_process_id');
            $table->foreign('analysis_process_id', 'analysis_process_id_fk_5335329')->references('id')->on('analysis_processes')->onDelete('cascade');
            $table->unsignedBigInteger('supporting_process_id');
            $table->foreign('supporting_process_id', 'supporting_process_id_fk_5335329')->references('id')->on('supporting_processes')->onDelete('cascade');
        });
    }
}
