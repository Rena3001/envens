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
        Schema::table('banners', function (Blueprint $table) {
            $table->string('title_az')->nullable()->after('id');
            $table->string('title_en')->nullable()->after('title_az');
            $table->string('title_ru')->nullable()->after('title_en');

            $table->string('subtitle_az')->nullable()->after('title_ru');
            $table->string('subtitle_en')->nullable()->after('subtitle_az');
            $table->string('subtitle_ru')->nullable()->after('subtitle_en');
        });
    }

    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn([
                'title_az', 'title_en', 'title_ru',
                'subtitle_az', 'subtitle_en', 'subtitle_ru',
            ]);
        });
    }
};
