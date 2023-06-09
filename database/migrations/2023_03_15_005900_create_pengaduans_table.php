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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index('fk_pengaduans_to_users');
            $table->foreignId('kategori_pengaduan_id')->nullable()->index('fk_pengaduans_to_kategori_pengaduans');
            $table->string('judul_pengaduan');
            $table->longText('isi_pengaduan');
            $table->date('tanggal_kejadian');
            $table->longText('lokasi_kejadian');
            $table->longText('bukti_foto');
            $table->enum('status', ['pending', 'ditolak', 'proses', 'selesai'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
