<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitigationUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('mitigation_user', function (Blueprint $table) {
            $table->unsignedBigInteger('mitigation_id');
            $table->foreign('mitigation_id', 'mitigation_id_fk_6207178')->references('id')->on('mitigations')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_6207178')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
