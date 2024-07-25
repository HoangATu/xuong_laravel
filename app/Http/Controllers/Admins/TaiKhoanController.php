<?php

namespace App\Http\Controllers\Admins;


use App\Models\User;
use App\Models\ChucVu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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

    public function edit(string $id){
        $taiKhoan = User::findOrFail($id);
        $chucVus = ChucVu::all();
        return view('admins.taikhoans.update', compact('taiKhoan', 'chucVus'));
    }

    public function update(Request $request, string $id){
        if($request->isMethod('PUT')){
            $params = $request->except('_token', '_method');
            $taiKhoan = User::findOrFail($id);
            if($request->hasFile('img_nguoi_dung')){ 
                if($taiKhoan->anh_dai_dien){
                Storage::disk('public')->delete($taiKhoan->anh_dai_dien);
                }
                $params['anh_dai_dien'] = $request->file('img_nguoi_dung')->store('uploads/taikhoan', 'public');
            }else{
                $params['anh_dai_dien'] = $taiKhoan->anh_dai_dien;
            }
            $taiKhoan->update($params);
            return redirect()->route('taikhoan.index')->with('success', 'Cập nhật người dùng mới thành công!');
    
        }
    
       
    }


    public function destroy(Request $request, string $id){
        if($request->isMethod('DELETE')){
            $taiKhoan = User::findOrFail($id);
            if($taiKhoan){
                $taiKhoan->delete();
            }
            return redirect()->route('taikhoan.index')->with('success', 'Xoá người dùng thành công');
        }
        return redirect()->route('taikhoan.index')->with('success', 'Xoá người dùng ko thành công');
    }
}
