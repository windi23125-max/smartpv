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
        // Hapus tabel lama jika "nyangkut"
        Schema::dropIfExists('readings');

        // Buat tabel baru
        Schema::create('readings', function (Blueprint $table) {
            $table->id();
            $table->float('voltage');
            $table->float('current');
            $table->float('power');
            $table->float('energy');
            $table->timestamp('recorded_at')->nullable(); // Saya kasih nullable biar aman
            $table->timestamps();
        });
    } // <--- INI TADI YANG HILANG (Penutup fungsi up)

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('readings');
    }
};