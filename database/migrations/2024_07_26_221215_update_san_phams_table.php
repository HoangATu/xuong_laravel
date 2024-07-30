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
        Schema::table('san_phams', function (Blueprint $table) {
            $table->double('gia_khuyen_mai')->nullable();
            $table->string('mo_ta_ngan')->nullable();
            $table->unsignedBigInteger('luot_xem')->default(0);
            $table->boolean('is_type')->default(true);
            $table->boolean('is_new')->default(true);
            $table->boolean('is_hot')->default(true);
            $table->boolean('is_hot_deal')->default(true);
            $table->boolean('is_show_home')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('san_phams', function (Blueprint $table) {
            $table->dropColumn('gia_khuyen_mai');
            $table->dropColumn('mo_ta_ngan');
            $table->dropColumn('luot_xem');
            $table->dropColumn('is_type');
            $table->dropColumn('is_new');
            $table->dropColumn('is_hot');
            $table->dropColumn('is_hot_deal');
            $table->dropColumn('is_show_home');
        });
    }
};
