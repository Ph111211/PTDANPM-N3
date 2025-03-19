<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiangVien extends Model
{
    use HasFactory;

    protected $table = 'giang_vien';
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $fillable = ['user_id', 'ho_ten', 'khoa', 'sdt', 'email', 'so_luong_sinh_vien_huong_dan'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
