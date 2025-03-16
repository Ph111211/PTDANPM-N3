<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeTai extends Model
{

    protected $table = 'de_tai'; 

    protected $primaryKey = 'id'; 

    public $incrementing = true; 

    protected $keyType = 'int'; 

    protected $fillable = [
        'id','ma_gv', 'ten_de_tai', 'mo_ta', 'ngay_dong', 'so_luong_toi_da', 'so_luong_hien_tai', 'trang_thai'
    ];
}
