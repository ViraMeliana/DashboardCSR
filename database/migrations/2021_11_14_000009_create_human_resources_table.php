<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHumanResourcesTable extends Migration
{
    public function up()
    {
        Schema::create('human_resources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('competence');
            $table->string('awareness');
            $table->longText('scope');
            $table->longText('jobdesc');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
