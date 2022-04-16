<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBriberyRiskAssesmentsTable extends Migration
{
    public function up()
    {
        Schema::table('bribery_risk_assesments', function (Blueprint $table) {
            $table->unsignedBigInteger('atp_process_id');
            $table->foreign('atp_process_id', 'atp_process_fk_5335121')->references('id')->on('atp_processes');
            $table->unsignedBigInteger('personal_identification_id');
            $table->foreign('personal_identification_id', 'personal_identification_fk_5335145')->references('id')->on('positions');
            $table->unsignedBigInteger('document_id');
            $table->foreign('document_id', 'document_management_fk_5335445')->references('id')->on('document_managements');
        });
    }
}
