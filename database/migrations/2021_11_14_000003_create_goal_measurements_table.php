<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalMeasurementsTable extends Migration
{
    public function up()
    {
        Schema::create('goal_measurements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kpi');
            $table->integer('target')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
