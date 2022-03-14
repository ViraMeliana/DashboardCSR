<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvidancesTable extends Migration
{
    public function up()
    {
        Schema::create('evidances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('subject');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
