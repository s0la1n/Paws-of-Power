<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
            $table->string('name');
            
            // Базовые характеристики
            $table->integer('base_strength')->default(1);
            $table->integer('base_agility')->default(1);
            $table->integer('base_intelligence')->default(1);
            
            // Бонусы от активных бустов (вычисляются автоматически)
            $table->integer('bonus_strength')->default(0);
            $table->integer('bonus_agility')->default(0);
            $table->integer('bonus_intelligence')->default(0);
            
            // Внешний вид
            $table->foreignId('ear_id')->constrained('character_customizations');
            $table->foreignId('tail_id')->constrained('character_customizations');
            $table->foreignId('coat_id')->constrained('character_customizations');
            $table->foreignId('outfit_id')->nullable()->constrained('shop_items');
            
            $table->timestamps();
            
            $table->index(['username']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shop_items');
    }
};
