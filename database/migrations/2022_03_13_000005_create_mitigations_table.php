<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitigationsTable extends Migration
{
    public function up()
    {
        Schema::create('mitigations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject');
            $table->string('category');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
