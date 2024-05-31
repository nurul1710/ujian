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
        Schema::create('bajus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_baju');
            $table->enum('size', ['XL','L','S','M','XXL']);
            $table->double('harga_perhari');
            $table->integer('quantity');
            $table->enum('status', ['sewa','kembali']);
            $table->string('cover')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bajus');
    }
};
