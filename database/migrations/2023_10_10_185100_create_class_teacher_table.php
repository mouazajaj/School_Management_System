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
        Schema::create('class_teacher', function (Blueprint $table) {
            
            $table->id();
            $table->foreignId('class_id')->nullable()->default(Null)
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('teacher_id')->nullable()->default(Null)
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->tinyInteger('status')->default(0);
            $table->bigInteger('created_by')->nullable()->default(Null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_teacher');
    }
};