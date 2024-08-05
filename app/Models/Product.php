<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tb_san_pham';

    protected $primaryKey = 'id';

    protected $fillable = [
        'ten_san_pham',
        'so_luong',
        'gia_san_pham',
        'gia_khuyen_mai',
        'ngay_nhap',
        'mo_ta',
        'danh_muc_id',
        'trang_thai',
    ];
    
    // Due to this table not have timestamps. I mean... for every single table ? Guess. Paid me and I do it, idc
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class, 'danh_muc_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'san_pham_id');
    }

}
