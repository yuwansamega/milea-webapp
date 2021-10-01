<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->int('user_id');
            $table->int('ws_id');
            $table->string('file_1');
            $table->string('file_2');
            $table->string('file_3')->nullable();
            $table->string('file_4')->nullable();
            $table->string('file_5')->nullable();
            $table->enum('status', ['Menunggu Verifikasi', 'Ditolak', 'Diterima']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submissions');
    }
}