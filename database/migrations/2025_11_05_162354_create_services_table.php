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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');                   // Xidmət başlığı
            $table->text('description')->nullable();   // Qısa mətn
            $table->text('details')->nullable();       // Ətraflı mətn (details səhifəsi üçün)
            $table->string('image')->nullable();       // Şəkil
            $table->string('category')->nullable();    // Kateqoriya adı
            $table->date('date')->nullable();          // Tarix (məs. 20 Feb, 2024)
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
