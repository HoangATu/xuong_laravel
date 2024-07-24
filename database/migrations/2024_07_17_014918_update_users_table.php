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
        Schema::table('users', function (Blueprint $table) {
            $table->text('anh_dai_dien')->nullable()->after('name');
            $table->date('ngay_sinh')->after('anh_dai_dien');
            $table->string('so_dien_thoai', 20)->after('email'); // Using string for phone number
            $table->boolean('gioi_tinh')->default(0)->after('so_dien_thoai');
            $table->text('dia_chi')->after('gioi_tinh');
            $table->unsignedBigInteger('chuc_vu_id')->default(1)->after('dia_chi');
            $table->boolean('trang_thai')->default(0)->after('chuc_vu_id');
            $table->foreign('chuc_vu_id')->references('id')->on('chuc_vu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('anh_dai_dien');
            $table->dropColumn('ngay_sinh');
            $table->dropColumn('so_dien_thoai');
            $table->dropColumn('gioi_tinh');
            $table->dropColumn('dia_chi');
            $table->dropColumn('chuc_vu_id');
            $table->dropColumn('trang_thai');
        });
    }
};
