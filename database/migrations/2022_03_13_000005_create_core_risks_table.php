<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoreRisksTable extends Migration
{
    public function up()
    {
        Schema::create('core_risks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject');
            $table->longText('description')->nullable();
            $table->date('year')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
