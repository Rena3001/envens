<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Başlıq
            $table->string('title_az')->nullable()->after('title');
            $table->string('title_en')->nullable()->after('title_az');
            $table->string('title_ru')->nullable()->after('title_en');

            // Kateqoriya
            $table->string('category_az')->nullable()->after('category');
            $table->string('category_en')->nullable()->after('category_az');
            $table->string('category_ru')->nullable()->after('category_en');

            // Qısa təsvir
            $table->text('description_az')->nullable()->after('description');
            $table->text('description_en')->nullable()->after('description_az');
            $table->text('description_ru')->nullable()->after('description_en');

            // Ətraflı mətn
            $table->longText('details_az')->nullable()->after('details');
            $table->longText('details_en')->nullable()->after('details_az');
            $table->longText('details_ru')->nullable()->after('details_en');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'title_az', 'title_en', 'title_ru',
                'category_az', 'category_en', 'category_ru',
                'description_az', 'description_en', 'description_ru',
                'details_az', 'details_en', 'details_ru',
            ]);
        });
    }
};
