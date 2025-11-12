<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about', function (Blueprint $table) {
            $table->id();

            /** 🌐 Çoxdilli sahələr **/
            $table->string('title_az')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_ru')->nullable();

            $table->string('subtitle_az')->nullable();
            $table->string('subtitle_en')->nullable();
            $table->string('subtitle_ru')->nullable();

            $table->text('description_az')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ru')->nullable();

            /** 📋 Maddələr (çoxdilli JSON formatında saxlanacaq)
             * [
             *   {"az": "Yüksək keyfiyyət", "en": "High quality", "ru": "Высокое качество"},
             *   {"az": "10 illik təcrübə", "en": "10 years of experience", "ru": "10 лет опыта"}
             * ]
             */
            $table->json('points')->nullable();

            /** 🖼️ Şəkil sahələri **/
            $table->string('image')->nullable();

            /** 👤 CEO məlumatları **/
            $table->string('ceo_name')->nullable();

            $table->string('ceo_title_az')->nullable();
            $table->string('ceo_title_en')->nullable();
            $table->string('ceo_title_ru')->nullable();

            $table->string('ceo_image')->nullable();

            /** ⚙️ Status **/
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about');
    }
};
