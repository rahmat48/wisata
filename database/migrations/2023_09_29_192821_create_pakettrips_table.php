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
        Schema::create('pakettrip', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('id_wisata');
            $table->integer('id_event')->nullable();
            $table->integer('id_kuliner');
            $table->longText('deskripsi');
            $table->integer('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakettrip');
    }
};
