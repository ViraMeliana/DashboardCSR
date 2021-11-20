<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessPartnerIdentificationsTable extends Migration
{
    public function up()
    {
        Schema::create('business_partner_identifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('risk_level');
            $table->string('business_partner_name');
            $table->longText('address');
            $table->string('activity');
            $table->longText('smap_implementation');
            $table->string('self_smap_control');
            $table->longText('description')->nullable();
            $table->string('validate')->nullable();
            $table->date('validate_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
