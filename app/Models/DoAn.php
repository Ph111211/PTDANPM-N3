<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoAn extends Model
{
    use HasFactory;

    protected $table = 'do_an';
    protected $primaryKey = 'ma_do_an';
    public $incrementing = false;
    protected $fillable = [
        'ma_do_an', 'tieu_de', 'mo_ta', 'thoi_gian_bat_dau', 'thoi_gian_ket_thuc',
        'ma_sv', 'ma_gv', 'nhan_xet', 'ngay_gio', 'dia_diem', 'file_noi_dung', 'trang_thai', 'diem_so'
    ];

    public function SinhVien()
    {
        return $this->belongsTo(SinhVien::class, 'ma_sv', 'user_id');
    }

    public function GiangVien()
    {
        return $this->belongsTo(GiangVien::class, 'ma_gv', 'user_id');
    }
}
