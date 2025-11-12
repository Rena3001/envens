<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            // Ad sahələri
            $table->string('name_az')->nullable()->after('name');
            $table->string('name_en')->nullable()->after('name_az');
            $table->string('name_ru')->nullable()->after('name_en');

            // Vəzifə sahələri
            $table->string('position_az')->nullable()->after('position');
            $table->string('position_en')->nullable()->after('position_az');
            $table->string('position_ru')->nullable()->after('position_en');
        });
    }

    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn([
                'name_az', 'name_en', 'name_ru',
                'position_az', 'position_en', 'position_ru',
            ]);
        });
    }
};
