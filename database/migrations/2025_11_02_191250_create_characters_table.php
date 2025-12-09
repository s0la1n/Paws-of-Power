<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
            $table->string('name');
            
            $table->integer('strength')->default(1);
            $table->integer('agility')->default(1);
            $table->integer('intelligence')->default(1);
            
            $table->integer('strength_bonus')->default(0);
            $table->integer('agility_bonus')->default(0);
            $table->integer('intelligence_bonus')->default(0);
            
            // Foreign keys на существующие таблицы
            $table->foreignId('ear_id')->constrained('character_customizations');
            $table->foreignId('tail_id')->constrained('character_customizations');
            $table->foreignId('coat_id')->constrained('character_customizations');
            $table->foreignId('outfit_id')->nullable()->constrained('shop_items');
            
            // Активные бусты (храним ID предметов из инвентаря)
            $table->foreignId('active_boost_1')->nullable()->constrained('inventories');
            $table->foreignId('active_boost_2')->nullable()->constrained('inventories');
            
            $table->timestamps();
            $table->index(['username']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
