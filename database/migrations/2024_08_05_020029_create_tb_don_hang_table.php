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
        Schema::create('tb_don_hang', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('ma_don_hang', 50);
            $table->integer('nguoi_dung_id')->nullable()->index('nguoi_dung_id');
            $table->string('ten_nguoi_nhan');
            $table->string('email_nguoi_nhan')->nullable();
            $table->string('so_dien_thoai_nguoi_nhan', 20)->nullable();
            $table->text('dia_chi_nguoi_nhan')->nullable();
            $table->date('ngay_dat')->nullable();
            $table->decimal('tong_tien', 10);
            $table->text('ghi_chu')->nullable();
            $table->integer('phuong_thuc_thanh_toan_id')->nullable()->index('phuong_thuc_thanh_toan_id');
            $table->integer('trang_thai_id')->nullable()->index('trang_thai_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_don_hang');
    }
};
