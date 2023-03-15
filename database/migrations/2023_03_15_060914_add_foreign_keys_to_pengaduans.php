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
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_pengaduans_to_users')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kategori_pengaduan_id', 'fk_pengaduans_to_kategori_pengaduans')->references('id')->on('kategori_pengaduans')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->dropForeign('fk_pengaduans_to_users');
            $table->dropForeign('fk_pengaduans_to_kategori_pengaduans');
        });
    }
};
