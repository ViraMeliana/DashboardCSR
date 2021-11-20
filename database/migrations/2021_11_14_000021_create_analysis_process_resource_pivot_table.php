<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalysisProcessResourcePivotTable extends Migration
{
    public function up()
    {
        Schema::create('analysis_process_resource', function (Blueprint $table) {
            $table->unsignedBigInteger('analysis_process_id');
            $table->foreign('analysis_process_id', 'analysis_process_id_fk_5335325')->references('id')->on('analysis_processes')->onDelete('cascade');
            $table->unsignedBigInteger('resource_id');
            $table->foreign('resource_id', 'resource_id_fk_5335325')->references('id')->on('resources')->onDelete('cascade');
        });
    }
}
