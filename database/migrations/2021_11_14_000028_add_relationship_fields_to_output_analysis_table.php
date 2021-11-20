<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOutputAnalysisTable extends Migration
{
    public function up()
    {
        Schema::table('output_analysis', function (Blueprint $table) {
            $table->unsignedBigInteger('analysis_process_id')->nullable();
            $table->foreign('analysis_process_id', 'analysis_process_fk_5335342')->references('id')->on('analysis_processes');
        });
    }
}
