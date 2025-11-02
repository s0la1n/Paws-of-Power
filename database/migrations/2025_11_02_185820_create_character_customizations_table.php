<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('character_customizations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['ear', 'tail', 'coat']);
            $table->string('asset_url');
            $table->string('color_code')->nullable(); // Только для окрасов
            $table->boolean('is_default')->default(false);
            $table->timestamps();
            
            $table->index(['type', 'is_default']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('character_customizations');
    }
};
