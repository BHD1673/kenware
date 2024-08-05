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
        Schema::table('tb_tai_khoan', function (Blueprint $table) {
            $table->foreign(['chuc_vu_id'], 'tb_tai_khoan_ibfk_1')->references(['id'])->on('tb_chuc_vu')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_tai_khoan', function (Blueprint $table) {
            $table->dropForeign('tb_tai_khoan_ibfk_1');
        });
    }
};
