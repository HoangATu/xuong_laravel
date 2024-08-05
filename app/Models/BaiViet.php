<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    use HasFactory;
    protected $fillable = [
        'tieu_de',
        'hinh_anh',
        'noi_dung',
    ];
}
