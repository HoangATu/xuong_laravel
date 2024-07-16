<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DanhMuc extends Model
{
    use HasFactory;
    public function getList() {
        $listDanhMuc= DB::table('danh_mucs')->orderByDesc('id')->get();
        return $listDanhMuc;
    }

    public function createDanhMuc($datas){
        DB::table('danh_mucs')->insert($datas);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
