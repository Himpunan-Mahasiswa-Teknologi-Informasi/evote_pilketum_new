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
        Schema::create('votes', function (Blueprint $table) {
            $table->id('id_vote');
            $table->timestamps();
            $table->unsignedBigInteger('id_paslon')->index;
            $table->foreign('id_paslon')->references('id_paslon')->on('paslons');
            $table->unsignedBigInteger('id_mahasiswa')->index;
            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
