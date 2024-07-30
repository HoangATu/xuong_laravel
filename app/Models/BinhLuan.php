<?php

namespace App\Models;

use App\Models\User;
use App\Models\SanPham;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BinhLuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'san_pham_id',
        'tai_khoan_id',
        'noi_dung',
        'ngay_dang',
        'danh_gia',
    ];

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class);
    }

    public function taiKhoan()
    {
        return $this->belongsTo(User::class);
    }

   
}
