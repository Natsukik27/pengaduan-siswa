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
        Schema::create('input_aspirasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nis');
            $table->unsignedBigInteger('kategori_id');
            $table->string('lokasi', 50);
            $table->string('keterangan', 255);
            $table->string('foto')->nullable();
            $table->timestamps();

            // Relasi ke tabel lain
            $table->foreign('nis')
                  ->references('nis')
                  ->on('siswas')
                  ->onDelete('cascade');

            $table->foreign('kategori_id')
                  ->references('id')
                  ->on('kategoris')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_aspirasis');
    }
};
