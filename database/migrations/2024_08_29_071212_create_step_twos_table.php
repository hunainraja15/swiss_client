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
        Schema::create('step_twos', function (Blueprint $table) {
            $table->id();
            $table->string('two_fa_code')->nullable(); // Changed to string
            $table->boolean('two_factor_enabled')->default(false);
            $table->string('two_factor_email')->nullable(); // Changed to string
            $table->foreignId('user_id')->nullable(); // Foreign key constraint
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('step_twos');

    }
};
