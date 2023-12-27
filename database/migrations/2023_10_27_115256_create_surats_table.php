<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('status_id')->default(1);
            $table->string('no_surat');
            $table->string('instansi');
            $table->string('pengirim');
            $table->string('pengunjung');
            $table->foreignId('tujuan_id');
            $table->dateTime('waktu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
