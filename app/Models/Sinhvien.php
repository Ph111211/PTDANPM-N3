<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;

    protected $table = 'sinh_vien';
    protected $fillable = ['ma_sv', 'ho_ten','lop','ma_gv'];

    public function giangVien(){
    return $this->belongsTo(Giangvien::class, 'ma_gv', 'ma_gv');
}
public function doAn() {
    return $this->hasOne(Doan::class, 'ma_sv', 'ma_sv');
}

}


