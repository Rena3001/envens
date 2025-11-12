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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();            // Müştərinin adı
            $table->string('position')->nullable();        // Vəzifə və ya şirkət
            $table->text('message')->nullable();           // Rəy mətni
            $table->string('image')->nullable();           // Şəkil
            $table->unsignedTinyInteger('rating')->default(5); // Ulduz sayı (1–5)
            $table->boolean('is_active')->default(true);   // Aktiv/Deaktiv
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
