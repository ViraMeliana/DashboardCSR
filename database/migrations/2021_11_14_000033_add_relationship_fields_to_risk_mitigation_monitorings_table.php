<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRiskMitigationMonitoringsTable extends Migration
{
    public function up()
    {
        Schema::table('risk_mitigation_monitorings', function (Blueprint $table) {
            $table->unsignedBigInteger('responsible_id');
            $table->foreign('responsible_id', 'responsible_fk_5335259')->references('id')->on('users');
        });
    }
}
