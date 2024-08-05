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
        Schema::table('tb_gio_hang', function (Blueprint $table) {
            $table->foreign(['nguoi_dung_id'], 'tb_gio_hang_ibfk_1')->references(['id'])->on('tb_tai_khoan')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_gio_hang', function (Blueprint $table) {
            $table->dropForeign('tb_gio_hang_ibfk_1');
        });
    }
};
