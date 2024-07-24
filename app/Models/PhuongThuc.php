<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhuongThuc extends Model
{
    use HasFactory;
    public function getList(){
        $listPhuongThuc = DB::table('phuong_thucs')->orderByDesc('id')->get();
        return $listPhuongThuc;
    }

    public function createPhuongThuc($datas){
        DB::table('phuong_thucs')->insert($datas);
    }
}
