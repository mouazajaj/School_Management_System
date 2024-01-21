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
        Schema::create('users', function (Blueprint $table) {
            
            $table->id();
            $table->string('name',50)->unique()->require();
            $table->string('email')->unique()->require();
            $table->string('admission_number',50)->nullable()->unique();
            $table->string('roll_number',50)->unique()->nullable();
            $table->integer('class_id')->nullable();
            $table->char('gender')->require();
            $table->date('date_of_birth')->nullable();
            $table->string('mobile_phone',25)->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('address',255)->nullable();;
            $table->string('qualification',50)->nullable();
            $table->string('experience',25)->nullable();
            $table->string('note',255)->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamp('email_verified_at')->nullable()->comment('1 active 0 inactive');
            $table->string('password');
            $table->foreignId('parent_id')->nullable()->default(Null)
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};