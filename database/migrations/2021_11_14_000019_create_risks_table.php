<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRisksTable extends Migration
{
    public function up()
    {
        Schema::create('risks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('risk_name');
            $table->longText('risk_process');
            $table->longText('description');
            $table->string('likelihood_baseline');
            $table->string('consequences_baseline');
            $table->longText('iso');
            $table->longText('existing_control');
            $table->string('effectiveness');
            $table->longText('risk_cause');
            $table->longText('proactive_mitigation');
            $table->string('likelihood_target');
            $table->string('consequences_target');
            $table->longText('impact');
            $table->longText('reactive_mitigation')->nullable();
            $table->string('time_schedule');
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
