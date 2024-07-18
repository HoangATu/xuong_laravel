<?php

namespace App\Http\Controllers\Admins;


use App\Models\User;
use App\Models\ChucVu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaiKhoanController extends Controller
{

    public $users;
    public $chucVus;
    public function __construct(){
        $this->users = new User();
        $this->chucVus = new ChucVu();
    }


    public function index(){
        $listTaiKhoan = User::orderBy('id')->get();
        return view('admins.taikhoans.index', compact('listTaiKhoan'));
    }

    public function create(){
        $chucVus = ChucVu::all();
        return view('admins.taikhoans.create', compact('chucVus')); 
    }

    public function store(Request $request){
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            if($request->hasFile('img_nguoi_dung')){
                $filename = $request->file('img_nguoi_dung')->store('uploads/taikhoan', 'public');
            }else{
                $filename = null;
            }

            $params['anh_dai_dien'] = $filename;

            User::create($params);
            return redirect()->route('taikhoan.index')->with('success', 'Thêm người dùng mới thành công!');
        } 
    }
}
