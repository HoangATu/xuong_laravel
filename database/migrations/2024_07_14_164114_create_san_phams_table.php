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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();// primary, tự động tăng,...
            $table->string('ma_san_pham', 10)->unique();// unique dữ liệu ko đc trùng nhau.
            $table->string('ten_san_pham', 100);
            $table->double('gia', 8, 2);
            $table->integer('so_luong');
            $table->date('ngay_nhap');
            $table->text('mo_ta')->nullable();// cho phép giá trị null
            $table->unsignedBigInteger('danh_muc_id');
            $table->foreign('danh_muc_id')->references('id')->on('danh_mucs')->onDelete('cascade'); // Thiết lập ràng buộc khóa ngoại
            $table->boolean('trang_thai')->default(0); // default xét giá trị mặc định
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
