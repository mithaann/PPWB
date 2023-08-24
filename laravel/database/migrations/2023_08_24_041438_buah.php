<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('your_table_name', function (Blueprint $table) {
            $table->id();
            $table->string('buah_gambar');
            $table->string('buah_nama');
            $table->unsignedBigInteger('negara_id'); // Foreign key column
            $table->string('keterangan');
            $table->integer('stock');
            $table->timestamps();

            $table->foreign('negara_id')->references('id')->on('negara');
        });
    }

    public function down()
    {
        Schema::dropIfExists('your_table_name');
    }
};
