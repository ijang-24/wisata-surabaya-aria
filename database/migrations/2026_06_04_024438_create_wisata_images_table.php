<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wisata_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wisata_id')->constrained('wisatas')->onDelete('cascade');
            $table->string('foto_path');
            $table->string('angle_foto');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wisata_images');
    }
};