<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
            $table->foreignId('shop_item_id')->constrained('shop_items');
            $table->boolean('is_equipped')->default(false);
            $table->boolean('is_active')->default(false);
            $table->boolean('is_purchased')->default(true);
            $table->timestamps();
            
            $table->unique(['username', 'shop_item_id']);
            $table->index(['username', 'is_equipped']);
            $table->index(['username', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
