<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTpbsTable extends Migration
{
    public function up()
    {
        Schema::create('tpbs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tpb_number');
            $table->string('rka');
            $table->string('cash_out');
            $table->string('commited');
            $table->string('realization');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
