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
        // Copy data from the default users table to tb_tai_khoan table
        DB::table('users')->orderBy('id')->chunk(100, function ($users) {
            foreach ($users as $user) {
                DB::table('tb_tai_khoan')->insert([
                    'id' => $user->id,
                    'ho_ten' => $user->name,
                    'email' => $user->email,
                    'mat_khau' => $user->password,
                    // Assuming the other fields are null or have default values
                    'anh_dai_dien' => null,
                    'so_dien_thoai' => null,
                    'gioi_tinh' => null,
                    'dia_chi' => null,
                    'ngay_sinh' => null,
                    'chuc_vu_id' => null,
                    'trang_thai' => null,
                ]);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Optionally, delete the data from tb_tai_khoan table if rolling back
        DB::table('tb_tai_khoan')->truncate();
    }
};