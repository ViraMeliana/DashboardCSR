<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalysisProcessJobPivotTable extends Migration
{
    public function up()
    {
        Schema::create('analysis_process_job', function (Blueprint $table) {
            $table->unsignedBigInteger('analysis_process_id');
            $table->foreign('analysis_process_id', 'analysis_process_id_fk_5335326')->references('id')->on('analysis_processes')->onDelete('cascade');
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id', 'job_id_fk_5335326')->references('id')->on('jobs')->onDelete('cascade');
        });
    }
}
