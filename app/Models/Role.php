<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;


    protected $table = 'tb_chuc_vu';

    protected $fillable = [
        'ten_chuc_vu',
    ];

    public function taiKhoans()
    {
        return $this->hasMany(User::class, 'chuc_vu_id');
    }
}
