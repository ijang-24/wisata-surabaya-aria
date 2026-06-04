<?php
// database/migrations/2024_01_01_000001_create_wisata_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->text('deskripsi');
            $table->unsignedInteger('harga_tiket')->default(0);
            $table->string('jam_operasional');
            $table->string('nomor_kontak')->nullable();
            $table->string('cover_foto')->nullable();
            $table->enum('kategori', ['religi', 'sejarah', 'edukasi', 'kuliner', 'hiburan']);
            $table->string('video_url')->nullable();
            $table->text('maps_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wisata');
    }
};