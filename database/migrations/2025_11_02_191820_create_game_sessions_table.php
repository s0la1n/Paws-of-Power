<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('game_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained();
            $table->string('username');
            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
            $table->enum('result', ['win', 'loss', 'draw'])->nullable();
            $table->integer('score_earned')->default(0);
            $table->integer('lives_used')->default(0);
            $table->json('session_data')->nullable(); // Данные игры
            $table->timestamps();
            
            $table->index(['username', 'created_at']);
            $table->index(['game_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('game_sessions');
    }
};
