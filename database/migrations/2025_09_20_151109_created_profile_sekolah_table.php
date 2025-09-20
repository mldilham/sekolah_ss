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
        //
        Schema::create('profile_sekolah', function (Blueprint $table) {
            $table->id('id_profil');
            $table->string('nama_sekolah', 40);
            $table->string('kepala_sekolah', 40);
            $table->string('foto', 100)->nullable();   // foto kepala sekolah
            $table->string('logo', 100)->nullable();   // logo sekolah
            $table->string('npsn', 10);
            $table->text('alamat');
            $table->string('kontak', 15)->nullable();
            $table->text('visi_misi')->nullable();
            $table->year('tahun_berdiri')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('profile_sekolah');
    }
};
