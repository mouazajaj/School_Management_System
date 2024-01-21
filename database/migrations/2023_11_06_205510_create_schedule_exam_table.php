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
        Schema::create('schedule_exam', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('class_id');
            $table->bigInteger('subject_id');
            $table->bigInteger('exam_id');
            $table->date('exam_date')->nullable();
            $table->time('start_time')->nullable(); 
            $table->time('end_time')->nullable();
            $table->Integer('room_number')->nullable()->nullable();
            $table->Integer('passing_mark')->nullable();
            $table->Integer('full_mark')->nullable();
            $table->bigInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_exam');
    }
};