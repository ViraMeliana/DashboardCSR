<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvidanceMitigationPivotTable extends Migration
{
    public function up()
    {
        Schema::create('evidance_mitigation', function (Blueprint $table) {
            $table->unsignedBigInteger('mitigation_id');
            $table->foreign('mitigation_id', 'mitigation_id_fk_6207177')->references('id')->on('mitigations')->onDelete('cascade');
            $table->unsignedBigInteger('evidance_id');
            $table->foreign('evidance_id', 'evidance_id_fk_6207177')->references('id')->on('evidances')->onDelete('cascade');
        });
    }
}
