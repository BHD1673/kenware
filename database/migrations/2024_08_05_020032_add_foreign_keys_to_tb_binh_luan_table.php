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
        Schema::table('tb_binh_luan', function (Blueprint $table) {
            $table->foreign(['tai_khoan_id'], 'tb_binh_luan_ibfk_1')->references(['id'])->on('tb_tai_khoan')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['san_pham_id'], 'tb_binh_luan_ibfk_2')->references(['id'])->on('tb_san_pham')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_binh_luan', function (Blueprint $table) {
            $table->dropForeign('tb_binh_luan_ibfk_1');
            $table->dropForeign('tb_binh_luan_ibfk_2');
        });
    }
};
