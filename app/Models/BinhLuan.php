<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BinhLuan extends Model
{
    use HasFactory;

    public function getList(){
        $listBinhLuan = DB::table('binh_luans')->orderByDesc('id')->get();
        return $listBinhLuan;
    }

    public function createDanhMuc($datas){
        DB::table('danh_mucs')->insert($datas);
    }

   
}
