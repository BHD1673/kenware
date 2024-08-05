<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tb_tai_khoan', function (Blueprint $table) {
            if (!Schema::hasTable('tb_tai_khoan')) {
                Schema::create('tb_tai_khoan', function (Blueprint $table) {
                    $table->integer('id', true);
                    $table->string('anh_dai_dien')->nullable();
                    $table->string('ho_ten');
                    $table->string('email')->unique('email');
                    $table->string('so_dien_thoai', 20)->nullable();
                    $table->tinyInteger('gioi_tinh')->nullable();
                    $table->text('dia_chi')->nullable();
                    $table->date('ngay_sinh')->nullable();
                    $table->string('mat_khau');
                    $table->integer('chuc_vu_id')->nullable()->index('chuc_vu_id');
                    $table->tinyInteger('trang_thai')->nullable();
                });
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // You might want to delete the data from tb_tai_khoan table if rolling back
        DB::table('tb_tai_khoan')->truncate();
    }
};
