<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    
    protected $table = 'tb_binh_luan';

    protected $fillable = [
        'tai_khoan_id',
        'san_pham_id',
        'noi_dung',
        'trang_thao',
        'ten_nguoi_dung',
        'email'
    ];

}
