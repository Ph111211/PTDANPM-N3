<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doan extends Model
{
    use HasFactory;

    protected $table = 'do_an';
    protected $fillable = ['ma_do_an', 'tieu_de','ma_sv', 'ma_gv', 'trang_thai'];

    public function giangVien()
    {
        return $this->belongsTo(Giangvien::class, 'ma_gv', 'ma_gv');
    }
    public function sinhVien()
    {
    return $this->belongsTo(SinhVien::class, 'ma_sv', 'ma_sv');
    }

}

