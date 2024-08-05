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
        Schema::table('tb_san_pham', function (Blueprint $table) {
            $table->foreign(['danh_muc_id'], 'tb_san_pham_ibfk_1')->references(['id'])->on('tb_danh_muc')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_san_pham', function (Blueprint $table) {
            $table->dropForeign('tb_san_pham_ibfk_1');
        });
    }
};
