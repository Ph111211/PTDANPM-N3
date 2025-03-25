<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'role',
        'name', 'email', 'password', 'role',
    ];

    public function giangvien()
    {
        return $this->hasOne(GiangVien::class, 'user_id');
    }

    public function sinhvien()
    {
        return $this->hasOne(SinhVien::class, 'user_id');
    }

    public function vanphongkhoa()
    {
        return $this->hasOne(VanPhongKhoa::class, 'user_id');
    }
    /**
     * Get the lecturer associated with the user.
     */
    public function GiangVien()
    {
        return $this->hasOne(GiangVien::class);
    }

    /**
     * Get the students associated with the user.
     */
    public function SinhVien()
    {
        return $this->hasOne(SinhVien::class);
    }
}
