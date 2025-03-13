<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;

    protected $table = 'sinh_vien';
    protected $primaryKey = 'ma_sv';
    public $incrementing = false;
    protected $fillable = ['ma_sv', 'ho_ten','ngay_sinh','gioi_tinh','lop','sdt','email','dia_chi','ma_gv'];

    public function giangVien(){
    return $this->belongsTo(Giangvien::class, 'ma_gv', 'ma_gv');
}
public function doAn() {
    return $this->hasOne(Doan::class, 'ma_sv', 'ma_sv');
}

}


