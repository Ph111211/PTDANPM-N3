<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giangvien extends Model
{
    use HasFactory;

    protected $table = 'giang_vien';

    // Giả sử mối quan hệ là hasMany với bảng SinhVien
    public function giangVien()
    {
        return $this->hasMany(SinhVien::class, 'ma_gv', 'ma_gv');
    }
}
