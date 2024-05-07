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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_user");
            $table->string('nama');
            $table->decimal('harga', 10, 2);
            $table->integer('stok');
            $table->decimal('berat', 8, 2);
            $table->string('gambar')->nullable();
            $table->enum('kondisi', ['baru', 'bekas'])->default('baru');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
