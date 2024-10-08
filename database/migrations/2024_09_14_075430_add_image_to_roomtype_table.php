<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('room_types', function (Blueprint $table) {
            $table->binary('image_data')->nullable(); // ใช้สำหรับเก็บรูปในฐานข้อมูลแบบ BLOB
        });
    }

    public function down()
    {
        Schema::table('room_types', function (Blueprint $table) {
            $table->dropColumn('image_data');
        });
    }

};
