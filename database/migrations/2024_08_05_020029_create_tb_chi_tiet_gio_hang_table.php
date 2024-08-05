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
        Schema::create('tb_chi_tiet_gio_hang', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('gio_hang_id')->nullable()->index('gio_hang_id');
            $table->integer('san_pham_id')->nullable()->index('san_pham_id');
            $table->integer('so_luong');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_chi_tiet_gio_hang');
    }
};
