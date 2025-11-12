<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();

            // Başlıqlar (3 dildə)
            $table->string('visit_title_az')->nullable();
            $table->string('visit_title_en')->nullable();
            $table->string('visit_title_ru')->nullable();

            // Mətnlər
            $table->text('visit_text_az')->nullable();
            $table->text('visit_text_en')->nullable();
            $table->text('visit_text_ru')->nullable();

            // Ünvan və koordinatlar
            $table->text('address_az')->nullable();
            $table->text('address_en')->nullable();
            $table->text('address_ru')->nullable();

            $table->string('map_url')->nullable();

            // Əlaqə məlumatları
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('email_1')->nullable();
            $table->string('email_2')->nullable();

            // Digər bloklar (Call və Email başlıqları və mətni)
            $table->string('call_title_az')->nullable();
            $table->string('call_title_en')->nullable();
            $table->string('call_title_ru')->nullable();
            $table->text('call_text_az')->nullable();
            $table->text('call_text_en')->nullable();
            $table->text('call_text_ru')->nullable();

            $table->string('email_title_az')->nullable();
            $table->string('email_title_en')->nullable();
            $table->string('email_title_ru')->nullable();
            $table->text('email_text_az')->nullable();
            $table->text('email_text_en')->nullable();
            $table->text('email_text_ru')->nullable();

            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_infos');
    }
};

