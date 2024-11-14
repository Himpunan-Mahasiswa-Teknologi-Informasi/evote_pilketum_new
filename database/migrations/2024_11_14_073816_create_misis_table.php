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
        Schema::create('misis', function (Blueprint $table) {
            $table->id('id_misi');
            $table->unsignedBigInteger('id_paslon');
            $table->foreign('id_paslon')->references('id_paslon')->on('paslons');
            $table->longText('misi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('misis');
    }
};
