<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_tai_khoan'; // Specify the table name

    protected $primaryKey = 'id'; // Specify the primary key column

    public $timestamps = false; // If your table doesn't have created_at and updated_at columns

    protected $fillable = [
        'anh_dai_dien',
        'ho_ten',
        'email',
        'so_dien_thoai',
        'gioi_tinh',
        'dia_chi',
        'ngay_sinh',
        'mat_khau',
        'chuc_vu_id',
        'trang_thai',
    ];

    protected $hidden = [
        'mat_khau', // Hide the password field
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function chucVu()
    {
        return $this->belongsTo(Role::class, 'chuc_vu_id');
    }

    public function getRoleAttribute()
    {
        return $this->attributes['role'] ?? 'user';
    }

    public function getAuthPassword()
    {
        return $this->mat_khau;
    }
}