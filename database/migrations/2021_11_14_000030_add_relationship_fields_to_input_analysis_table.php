<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInputAnalysisTable extends Migration
{
    public function up()
    {
        Schema::table('input_analysis', function (Blueprint $table) {
            $table->unsignedBigInteger('analysis_process_id');
            $table->foreign('analysis_process_id', 'analysis_process_fk_5335339')->references('id')->on('analysis_processes');
        });
    }
}
