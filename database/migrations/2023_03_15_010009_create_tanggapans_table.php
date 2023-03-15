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
        Schema::create('tanggapans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('petugas_id')->nullable()->index('fk_tanggapans_to_petugas');
            $table->foreignId('pengaduan_id')->nullable()->index('fk_tanggapans_to_pengaduans');
            $table->longText('isi_tanggapan');
            $table->date('tanggal_tanggapan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanggapans');
    }
};
