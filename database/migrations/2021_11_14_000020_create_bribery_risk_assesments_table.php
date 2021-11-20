<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBriberyRiskAssesmentsTable extends Migration
{
    public function up()
    {
        Schema::create('bribery_risk_assesments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('requirements');
            $table->longText('bribery_risk');
            $table->longText('impact');
            $table->longText('risk_causes');
            $table->longText('internal_control');
            $table->integer('l');
            $table->integer('c');
            $table->string('criteria_impact');
            $table->string('risk_level');
            $table->longText('proactive_mitigation')->nullable();
            $table->integer('l_target');
            $table->integer('c_target');
            $table->string('risk_level_target');
            $table->longText('opportunity')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
