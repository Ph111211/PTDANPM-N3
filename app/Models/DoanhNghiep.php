<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoanhNghiep extends Model
{
    use HasFactory;

    protected $table = 'doanh_nghiep';
    protected $primaryKey = 'ma_dn';
    public $timestamps = false;

    protected $fillable = [
        'ma_dn', 'ten_dn', 'dia_chi', 'sdt', 'email', 'nguoi_lien_he', 'so_luong_sinh_vien_tiep'
    ];

    public function ketquathuctap()
    {
        return $this->hasMany(KetQuaThucTap::class, 'ma_dn', 'ma_dn');
    }
}

