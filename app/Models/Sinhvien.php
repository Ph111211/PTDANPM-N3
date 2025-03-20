<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;

    protected $table = 'sinh_vien';
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $fillable = ['user_id', 'ho_ten','ngay_sinh','gioi_tinh','lop','sdt','email','dia_chi'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function doAn(){
        return $this->hasOne(Doan::class, 'ma_sv','user_id');
    }
}


