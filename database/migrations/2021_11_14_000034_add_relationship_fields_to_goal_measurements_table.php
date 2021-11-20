<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGoalMeasurementsTable extends Migration
{
    public function up()
    {
        Schema::table('goal_measurements', function (Blueprint $table) {
            $table->unsignedBigInteger('analysi_process_id');
            $table->foreign('analysi_process_id', 'analysi_process_fk_5335349')->references('id')->on('analysis_processes');
        });
    }
}
