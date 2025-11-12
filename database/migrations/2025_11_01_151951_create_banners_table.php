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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();          // Başlıq
            $table->string('subtitle')->nullable();       // Alt başlıq
            $table->string('button_text')->nullable();    // Düymə yazısı
            $table->string('button_link')->nullable();    // Düymə linki
            $table->string('image')->nullable();          // Şəkil yolu
            $table->boolean('is_active')->default(true);  // Aktiv/inaktiv
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
