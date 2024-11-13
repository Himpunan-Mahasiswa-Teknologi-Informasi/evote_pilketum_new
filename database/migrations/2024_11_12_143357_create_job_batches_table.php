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
        Schema::create('job_batches', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID sebagai primary key
            $table->string('name')->default(''); // Kolom name dengan default kosong
            $table->integer('total_jobs')->default(0); // Kolom total_jobs
            $table->integer('pending_jobs')->default(0); // Kolom pending_jobs
            $table->integer('failed_jobs')->default(0); // Kolom failed_jobs
            $table->text('failed_job_ids')->nullable(); // Kolom failed_job_ids sebagai text (atau JSON)
            $table->text('options')->nullable(); // Kolom options sebagai text (atau JSON)
            $table->string('created_at')->nullable(); // Kolom created_at dengan timestamp
            $table->string('cancelled_at')->nullable(); // Kolom cancelled_at bisa null
            $table->string('finished_at')->nullable(); // Kolom finished_at bisa null
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_batches');
    }
};
