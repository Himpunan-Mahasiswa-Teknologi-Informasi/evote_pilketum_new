<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportsTable extends Migration
{
    public function up()
    {
        Schema::create('imports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('file_name');
            $table->text('file_path');
            $table->string('importer');
            $table->integer('total_rows');
            $table->timestamps();
            $table->integer('processed_rows')->default(0); // Ubah ke integer
            $table->integer('successful_rows')->default(0); // Ubah ke integer
        });
    }

    public function down()
    {
        Schema::dropIfExists('imports');
    }
}
