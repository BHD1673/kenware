<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'tb_danh_muc';
    protected $primaryKey = "id";

    protected $fillable = [
        'ten_danh_muc',
        'mo_ta'
    ];


    public function products()
    {
        return $this->hasMany(Product::class, 'danh_muc_id');
    }
}
