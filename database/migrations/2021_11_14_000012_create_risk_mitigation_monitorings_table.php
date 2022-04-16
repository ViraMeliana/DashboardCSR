<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiskMitigationMonitoringsTable extends Migration
{
    public function up()
    {
        Schema::create('risk_mitigation_monitorings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('target');
            $table->string('goal');
            $table->integer('revision')->nullable();
            $table->string('proactive_mitigation');
            $table->date('plan_date');
            $table->date('realization_date')->nullable();
            $table->integer('l')->nullable();
            $table->integer('c')->nullable();
            $table->string('risk_level')->nullable();
            $table->integer('l_after')->nullable();
            $table->integer('c_after')->nullable();
            $table->string('risk_level_after')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
