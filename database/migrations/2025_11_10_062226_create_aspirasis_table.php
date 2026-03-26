<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('aspirasis', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Menunggu', 'Proses', 'Selesai'])->default('Menunggu');
            $table->unsignedBigInteger('input_aspirasi_id');
            $table->text('feedback');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('input_aspirasi_id')
                  ->references('id')
                  ->on('input_aspirasis')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('aspirasis');
    }
};