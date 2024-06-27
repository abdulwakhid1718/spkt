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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dokumen_id');
            $table->foreignId('user_id');
            $table->date('tanggal_kehilangan');
            $table->timestamp('tanggal_laporan');
            $table->text('lokasi_kehilangan');
            $table->text('kronologi');
            $table->enum('status_laporan', ['diproses', 'selesai', 'ditolak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
