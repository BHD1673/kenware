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
        Schema::table('tb_hinh_anh_sp', function (Blueprint $table) {
            $table->foreign(['san_pham_id'], 'tb_hinh_anh_sp_ibfk_1')->references(['id'])->on('tb_san_pham')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_hinh_anh_sp', function (Blueprint $table) {
            $table->dropForeign('tb_hinh_anh_sp_ibfk_1');
        });
    }
};
