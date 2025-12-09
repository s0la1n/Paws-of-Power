<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shop_items', function (Blueprint $table) {
            $table->id();
            $table->string('name_item');
            $table->text('description');
            $table->enum('category', ['outfit', 'boost']);
            $table->integer('price');
            $table->string('asset_url')->nullable();

            // Отдельные поля для бонусов
            $table->integer('strength_bonus')->default(0);
            $table->integer('agility_bonus')->default(0);
            $table->integer('intelligence_bonus')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shop_items');
    }
};
