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
        Schema::create('kulinerdesas', function (Blueprint $table) {
            $table->id();
            $table->string('namatempat');
            $table->longText('deskripsi');
            $table->time('jambuka');
            $table->time('jamtutup');
            $table->string('lokasi');
            $table->string('gambar');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kulinerdesas');
    }
};
