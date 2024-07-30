<?php

namespace App\Models;

use App\Models\DanhMuc;
use App\Models\HinhAnhSanPham;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SanPham extends Model
{
    use HasFactory;

    // sử dụng Raw Query (SQL Thuần)
    // public function getList(){
    //     $listSanPham = DB::select("SELECT * FROM san_phams ORDER BY id DESC");
    //     return $listSanPham;
    // }


    // sử dụng Query Builder
    // public function getList() {
    //     $listSanPham= DB::table('san_phams')->orderByDesc('id')->get();
    //     return $listSanPham;
    // }

    // public function createProduct($datas){
    //     DB::table('san_phams')->insert($datas);
    // }

    public function category()
    {
        return $this->belongsTo(DanhMuc::class);
    }

        

    public function hinhAnhSanPham(){
        return $this->hasMany(HinhAnhSanPham::class);
    }
    
    use SoftDeletes;

    


    // sử dụng eloquent
    protected $table = 'san_phams';

    protected $fillable = [
        'hinh_anh',
        'ma_san_pham',
        'ten_san_pham',
        'gia',
        'so_luong',
        'ngay_nhap',
        'danh_muc_id',
        'mo_ta',
        'trang_thai',
        'gia_khuyen_mai',
        'mo_ta_ngan',
        'luot_xem',
        'is_type',
        'is_new',
        'is_hot',
        'is_hot_deal',
        'is_show_home',
    ];

    protected $casts = [
        'is_type'=> 'boolean',
        'is_new'=> 'boolean',
        'is_hot'=> 'boolean',
        'is_hot_deal'=> 'boolean',
        'is_show_home'=> 'boolean',
    ];
}
