<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChucVu extends Model
{
    use HasFactory;
    public function getList() {
        $listChucVu= DB::table('chuc_vus')->orderByDesc('id')->get();
        return $listChucVu;
    }

    public function createChucVu($datas){
        DB::table('chuc_vus')->insert($datas);
    }

    // public function users()
    // {
    //     return $this->hasMany(::class);
    // }

}
