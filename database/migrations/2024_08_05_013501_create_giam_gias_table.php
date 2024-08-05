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
        Schema::create('giam_gias', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Mã giảm giá duy nhất
            $table->decimal('discount_amount', 8, 2); // Số tiền giảm giá, kiểu số thập phân với 8 chữ số và 2 chữ số thập phân
            $table->date('expiry_date'); // Ngày hết hạn của mã giảm giá
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('giam_gias');
    }
};
