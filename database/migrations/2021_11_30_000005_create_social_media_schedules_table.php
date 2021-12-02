<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialMediaSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('social_media_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('event');
            $table->longText('description')->nullable();
            $table->string('type');
            $table->longText('caption')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
