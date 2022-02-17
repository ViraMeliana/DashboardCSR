<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTjslTpbPivotTable extends Migration
{
    public function up()
    {
        Schema::create('tjsl_tpb', function (Blueprint $table) {
            $table->unsignedBigInteger('tjsl_id');
            $table->foreign('tjsl_id', 'tjsl_id_fk_6012884')->references('id')->on('tjsls')->onDelete('cascade');
            $table->unsignedBigInteger('tpb_id');
            $table->foreign('tpb_id', 'tpb_id_fk_6012884')->references('id')->on('tpbs')->onDelete('cascade');
        });
    }
}
