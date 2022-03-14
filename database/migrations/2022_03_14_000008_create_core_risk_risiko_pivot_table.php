<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoreRiskRisikoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('core_risk_risiko', function (Blueprint $table) {
            $table->unsignedBigInteger('core_risk_id');
            $table->foreign('core_risk_id', 'core_risk_id_fk_6207070')->references('id')->on('core_risks')->onDelete('cascade');
            $table->unsignedBigInteger('risiko_id');
            $table->foreign('risiko_id', 'risiko_id_fk_6207070')->references('id')->on('risikos')->onDelete('cascade');
        });
    }
}
