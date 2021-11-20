<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalysisProcessHumanResourcePivotTable extends Migration
{
    public function up()
    {
        Schema::create('analysis_process_human_resource', function (Blueprint $table) {
            $table->unsignedBigInteger('analysis_process_id');
            $table->foreign('analysis_process_id', 'analysis_process_id_fk_5335327')->references('id')->on('analysis_processes')->onDelete('cascade');
            $table->unsignedBigInteger('human_resource_id');
            $table->foreign('human_resource_id', 'human_resource_id_fk_5335327')->references('id')->on('human_resources')->onDelete('cascade');
        });
    }
}
