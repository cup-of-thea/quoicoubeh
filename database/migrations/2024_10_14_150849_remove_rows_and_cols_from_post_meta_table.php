<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('post_meta', function (Blueprint $table) {
            $table->dropColumn('rows');
            $table->dropColumn('cols');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post_meta', function (Blueprint $table) {
            $table->unsignedTinyInteger('rows')->default(2)->after('review_authors');
            $table->unsignedTinyInteger('cols')->default(2)->after('rows');
        });
    }
};
