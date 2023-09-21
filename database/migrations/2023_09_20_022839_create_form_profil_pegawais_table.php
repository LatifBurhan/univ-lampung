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
        Schema::create('form_profil_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nip_pegawai')->unique();
            $table->string('nama_pegawai')->nullable();
            $table->string('ttl_pegawai')->nullable();
            $table->string('email_pegawai')->nullable();
            $table->string('website_pegawai')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('keahlian')->nullable();
            $table->string('pas_foto')->nullable();
            $table->string('file_name');
            $table->string('file_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_profil_pegawai');
    }
};
