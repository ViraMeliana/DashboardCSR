<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTpbsTable extends Migration
{
    public function up()
    {
        Schema::table('tpbs', function (Blueprint $table) {
            $table->unsignedBigInteger('pilar_id')->nullable();
            $table->foreign('pilar_id', 'pilar_fk_6012879')->references('id')->on('pilars');
        });
    }
}
