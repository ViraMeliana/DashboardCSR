<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBusinessPartnerIdentificationsTable extends Migration
{
    public function up()
    {
        Schema::table('business_partner_identifications', function (Blueprint $table) {
            $table->unsignedBigInteger('business_partner_id');
            $table->foreign('business_partner_id', 'business_partner_fk_5335017')->references('id')->on('business_partners');
        });
    }
}
