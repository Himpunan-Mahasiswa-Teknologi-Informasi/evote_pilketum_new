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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Assuming you have a users table
            $table->string('file_name');
            $table->text('file_path');
            $table->string('importer');
            $table->integer('total_rows');
            $table->timestamps();
            $table->string('processed_rows')->default('');;
            $table->string('successful_rows')->default('');;
        });
    }

    public function down()
    {
        Schema::dropIfExists('imports');
    }
}

