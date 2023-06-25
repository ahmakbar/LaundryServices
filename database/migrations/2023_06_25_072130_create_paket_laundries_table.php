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
        Schema::create('paket_laundries', function (Blueprint $table) {
            $table->id();
            $table->string('paket_laundry_id')->unique();
            $table->string('nama_paket');
            $table->integer('harga_per_kilo');
            $table
                ->integer('durasi_paket')
                ->nullable()
                ->comment('Berapa lama layanan paket laundry');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_laundries');
    }
};
