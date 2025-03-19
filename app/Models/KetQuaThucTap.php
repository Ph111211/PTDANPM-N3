<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetQuaThucTap extends Model
{
    use HasFactory;

    protected $table = 'ket_qua_thuc_tap';
    protected $primaryKey = 'ma_ket_qua';
    public $incrementing = false;
    protected $fillable = [
        'ma_ket_qua', 'ma_sv', 'ma_gv', 'diem_so',
        'nhan_xet_cua_giang_vien', 'nhan_xet_cua_doanh_nghiep', 'ten_dn'
    ];

    public function sinhvien()
    {
        return $this->belongsTo(SinhVien::class, 'ma_sv', 'user_id');
    }

    public function giangvien()
    {
        return $this->belongsTo(GiangVien::class, 'ma_gv', 'user_id');
    }
}
