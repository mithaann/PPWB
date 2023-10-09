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
        Schema::create('negaras', function (Blueprint $table) {
            $table->id();
            $table->string('negara_name');
            $table->string('negara_image');
            $table->unsignedBigInteger('benua_id'); // Foreign key column
            $table->timestamps();

            $table->foreign('benua_id')->references('id')->on('benuas');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('negara');
    }
};
