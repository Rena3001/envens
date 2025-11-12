<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contact_infos', function (Blueprint $table) {
            $table->text('map_url')->change(); // VARCHAR → TEXT
        });
    }

    public function down(): void
    {
        Schema::table('contact_infos', function (Blueprint $table) {
            $table->string('map_url', 255)->change(); // Geri qaytarmaq istəsən
        });
    }
};
