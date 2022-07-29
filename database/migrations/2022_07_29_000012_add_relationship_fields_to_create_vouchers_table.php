<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCreateVouchersTable extends Migration
{
    public function up()
    {
        Schema::table('create_vouchers', function (Blueprint $table) {
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->foreign('agent_id', 'agent_fk_6857059')->references('id')->on('users');
            $table->unsignedBigInteger('hotel_name_id')->nullable();
            $table->foreign('hotel_name_id', 'hotel_name_fk_6857066')->references('id')->on('hotels');
            $table->unsignedBigInteger('room_type_id')->nullable();
            $table->foreign('room_type_id', 'room_type_fk_7066451')->references('id')->on('rooms_types');
        });
    }
}
