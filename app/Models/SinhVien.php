<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;

    protected $table = 'sinh_vien'; // Tên bảng trong CSDL
    protected $primaryKey = 'ma_sv'; // Khóa chính
    public $incrementing = false;
    public $timestamps = false; // Không sử dụng timestamps

        protected $fillable = [
            'ma_sv', 'ho_ten', 'ngay_sinh', 'gioi_tinh', 'lop', 'sdt', 'email', 'dia_chi', 'ma_gv', 'ma_dn'
        ];

    public function doan()
    {
        return $this->hasOne(DoAn::class, 'ma_sv', 'ma_sv');
    }

    public function giangvien()
    {
        return $this->belongsTo(GiangVien::class, 'ma_gv', 'ma_gv');
    }
    public function ketquathuctap()
    {
        return $this->hasOne(KetQuaThucTap::class, 'ma_sv', 'ma_sv');
    }
}
