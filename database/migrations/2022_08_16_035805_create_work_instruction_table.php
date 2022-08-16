<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkInstructionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_instructions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('no_urut')->nullable();
            $table->integer('no_ik')->nullable();
            $table->string('work_unit')->nullable();
            $table->date('publish_date')->nullable();
            $table->date('reassessment_date')->nullable();
            $table->date('check_date')->nullable();
            $table->string('tindakan')->nullable();
            $table->longText('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

}
