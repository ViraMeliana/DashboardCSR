<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtpProcessesTable extends Migration
{
    public function up()
    {
        Schema::create('atp_processes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('activity');
            $table->longText('description')->nullable();
            $table->string('transaction')->nullable();
            $table->string('project')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
