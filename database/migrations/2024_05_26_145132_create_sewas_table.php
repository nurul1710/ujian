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
        Schema::create('sewas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->double('totalHarga_sewa');
            $table->BigInteger('customer_id')->unsigned();
            $table->BigInteger('baju_id')->unsigned();
            $table->BigInteger('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('sewas', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('baju_id')->references('id')->on('bajus')
            ->onUpdate('cascade')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sewas');
    }
};
