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
        Schema::table('tb_don_hang', function (Blueprint $table) {
            $table->foreign(['nguoi_dung_id'], 'tb_don_hang_ibfk_1')->references(['id'])->on('tb_tai_khoan')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['phuong_thuc_thanh_toan_id'], 'tb_don_hang_ibfk_2')->references(['id'])->on('tb_phuong_thuc_thanh_toan')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['trang_thai_id'], 'tb_don_hang_ibfk_3')->references(['id'])->on('tb_trang_thai_don_hang')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_don_hang', function (Blueprint $table) {
            $table->dropForeign('tb_don_hang_ibfk_1');
            $table->dropForeign('tb_don_hang_ibfk_2');
            $table->dropForeign('tb_don_hang_ibfk_3');
        });
    }
};
