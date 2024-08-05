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
        Schema::create('tb_san_pham', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('ten_san_pham');
            $table->integer('so_luong');
            $table->decimal('gia_san_pham', 10);
            $table->decimal('gia_khuyen_mai', 10)->nullable();
            $table->date('ngay_nhap')->nullable();
            $table->text('mo_ta')->nullable();
            $table->integer('danh_muc_id')->nullable()->index('danh_muc_id');
            $table->tinyInteger('trang_thai')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_san_pham');
    }
};
