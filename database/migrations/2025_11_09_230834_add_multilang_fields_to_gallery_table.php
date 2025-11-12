<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            // Şəkil başlığı (title)
            $table->string('title_az')->nullable()->after('title');
            $table->string('title_en')->nullable()->after('title_az');
            $table->string('title_ru')->nullable()->after('title_en');

            // Kateqoriya (category)
            $table->string('category_az')->nullable()->after('category');
            $table->string('category_en')->nullable()->after('category_az');
            $table->string('category_ru')->nullable()->after('category_en');
        });
    }

    public function down(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->dropColumn([
                'title_az', 'title_en', 'title_ru',
                'category_az', 'category_en', 'category_ru',
            ]);
        });
    }
};
