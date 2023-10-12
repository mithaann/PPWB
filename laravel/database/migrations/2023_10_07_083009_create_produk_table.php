<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('buah_gambar');
            $table->string('buah_nama');
            $table->double('harga', 12, 2)->default(0);
            $table->unsignedBigInteger('negara_id'); // Foreign key column
            $table->text('keterangan');
            $table->integer('stock');
            $table->timestamps();
            $table->foreign('negara_id')->references('id')->on('negaras');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};

