<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitigationRisikoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('mitigation_risiko', function (Blueprint $table) {
            $table->unsignedBigInteger('risiko_id');
            $table->foreign('risiko_id', 'risiko_id_fk_6207128')->references('id')->on('risikos')->onDelete('cascade');
            $table->unsignedBigInteger('mitigation_id');
            $table->foreign('mitigation_id', 'mitigation_id_fk_6207128')->references('id')->on('mitigations')->onDelete('cascade');
        });
    }
}
