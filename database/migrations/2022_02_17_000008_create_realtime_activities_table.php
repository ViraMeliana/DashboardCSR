<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealtimeActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('realtime_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->date('date');
            $table->string('type');
            $table->integer('total');
            $table->string('location');
            $table->string('village')->nullable();
            $table->string('subdistrict')->nullable();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->string('receiver');
            $table->integer('number_of_beneficiaries')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
