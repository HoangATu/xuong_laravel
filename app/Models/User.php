<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\ChucVu;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     * 
     */

    public function getList(){
        $listTaiKhoan = DB::table('users')->orderByDesc('id')->get();
        return $listTaiKhoan;
    }

    public function createProduct($datas){
        DB::table('users')->insert($datas);
    }

    public function chucVus()
    {
        return $this->belongsTo(ChucVu::class);
    } 

    protected $table = 'users'; 
    protected $fillable = [
        'name', 
        'email',
        'password',
        'anh_dai_dien',
        'so_dien_thoai',
        'dia_chi',
        'trang_thai',
        'gioi_tinh',
        'chuc_vu_id',
        'ngay_sinh',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
