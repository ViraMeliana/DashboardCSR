<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvidanceEvidanceQuartalPivotTable extends Migration
{
    public function up()
    {
        Schema::create('evidance_evidance_quartal', function (Blueprint $table) {
            $table->unsignedBigInteger('evidance_id');
            $table->foreign('evidance_id', 'evidance_id_fk_6207186')->references('id')->on('evidances')->onDelete('cascade');
            $table->unsignedBigInteger('evidance_quartal_id');
            $table->foreign('evidance_quartal_id', 'evidance_quartal_id_fk_6207186')->references('id')->on('evidance_quartals')->onDelete('cascade');
        });
    }
}
