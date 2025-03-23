<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VanPhongKhoa extends Model
{
    use HasFactory;

    protected $table = 'van_phong_khoa';
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $fillable = ['user_id', 'ho_ten', 'chuc_vu', 'sdt', 'email'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

