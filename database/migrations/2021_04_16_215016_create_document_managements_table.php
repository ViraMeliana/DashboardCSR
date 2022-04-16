<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentManagementsTable extends Migration
{
    public function up()
    {
        Schema::create('document_managements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('document_number');
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
