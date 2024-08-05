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
        Schema::create('tb_chi_tiet_don_hang', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('don_hang_id')->nullable()->index('don_hang_id');
            $table->integer('san_pham_id')->nullable()->index('san_pham_id');
            $table->integer('so_luong');
            $table->decimal('gia', 10);
            $table->decimal('thanh_tien', 10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_chi_tiet_don_hang');
    }
};
