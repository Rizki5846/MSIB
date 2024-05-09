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
            $table->unsignedBigInteger("user_id");
            $table->string('nama');
            $table->decimal('harga', 10, 2);
            $table->integer('stok');
            $table->decimal('berat', 8, 2);
            $table->string('gambar')->nullable();
            $table->enum('kondisi', ['baru', 'bekas'])->default('baru');
            $table->text('deskripsi')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropForeign('user_id');
        });
    }
};
