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
         Schema::create('settings', function (Blueprint $table) {
            $table->id();

            // Əlaqə məlumatları
            $table->string('address')->nullable()->default('Baku, Azerbaijan');
            $table->string('phone')->nullable()->default('+994 50 000 00 00');
            $table->string('email')->nullable()->default('info@example.com');

            // Sosial media linkləri
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('youtube_link')->nullable();

            // Loqolar
            $table->string('header_logo')->nullable();
            $table->string('footer_logo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
