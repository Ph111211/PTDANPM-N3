<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoAn extends Model
{
    use HasFactory;

    protected $table = 'do_an';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'ma_do_an', 'tieu_de', 'mo_ta', 'thoi_gian_bat_dau', 'thoi_gian_ket_thuc',
        'ma_sv', 'ma_gv', 'ma_dn', 'trang_thai', 'diem_so'
    ];

    public function sinhvien()
    {
        return $this->belongsTo(SinhVien::class, 'ma_sv', 'ma_sv');
    }

    public function ketquatthuctap()
    {
        return $this->hasOne(KetQuaThucTap::class, 'ma_do_an', 'ma_do_an');
    }
}
