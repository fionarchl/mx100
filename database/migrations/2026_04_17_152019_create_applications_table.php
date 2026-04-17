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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained()->cascadeOnDelete();
            $table->foreignId('freelancer_id')->constrained('users')->cascadeOnDelete();
            $table->string('cv_path');
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->foreignId('status_id')->constrained('application_status');
            $table->timestamps();
            $table->string('created_by')->default('SYSTEM');
            $table->string('updated_by')->default('SYSTEM')->nullable();
            $table->unique(['job_id','freelancer_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
