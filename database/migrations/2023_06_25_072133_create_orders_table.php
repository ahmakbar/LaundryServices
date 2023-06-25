<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->string('jenis');
            $table->integer('berat')->nullable();
            $table->integer('harga_total')->nullable();
            $table->string('catatan')->nullable();
            $table
                ->enum('status', [0, 1, 2])
                ->default(0)
                ->comment('0= diterima, 1= selesai, 2= diproses');

            $table->string('user_id');
            $table
                ->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('paket_laundry_id');
            $table
                ->foreign('paket_laundry_id')
                ->references('paket_laundry_id')
                ->on('paket_laundries')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
