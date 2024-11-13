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
            $table->uuid('id')->primary();
            $table->string('name')->default('');
            $table->integer('total_jobs')->default(0);
            $table->integer('pending_jobs')->default(0);
            $table->integer('failed_jobs')->default(0);
            $table->text('failed_job_ids')->nullable();
            $table->text('options')->nullable();
            $table->string('created_at')->nullable();
            $table->string('cancelled_at')->nullable();
            $table->string('finished_at')->nullable();
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
