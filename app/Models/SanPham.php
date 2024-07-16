<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
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
    public function getList() {
        $listSanPham= DB::table('san_phams')->orderByDesc('id')->get();
        return $listSanPham;
    }

    public function createProduct($datas){
        DB::table('san_phams')->insert($datas);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

        

    public function getDetailProduct($id) {
        $san_pham = DB::table('san_phams')->where('id', $id)->first();

        return $san_pham;
    }

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
    ];
}
