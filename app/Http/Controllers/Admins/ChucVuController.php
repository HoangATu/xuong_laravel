<?php

namespace App\Http\Controllers\Admins;

use App\Models\ChucVu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChucVuController extends Controller
{
    public $chuc_vus;
    public function __construct(){
        $this->chuc_vus = new ChucVu();
    }


   public function index(){
    $listChucVu = ChucVu::orderBy('id')->get();
        $title = "Danh sách chức vụ";
        return view('admins.chucvus.index', compact('title', 'listChucVu'));
   }

   public function create(){
    return view('admins.chucvus.create');
   }

   public function store(Request $request){
    if($request->isMethod('POST')){
        $params = $request->except('_token');
        $this->chuc_vus->createChucVu($params);
        return redirect()->route('chucvu.index')->with('success','Thêm chức vụ  thành công!');
    }
   }

   public function destroy(Request $request, String $id){
    if($request->isMethod('DELETE')){
        $chucVu = ChucVu::findOrFail($id);
        if($chucVu){
            $chucVu->delete();
        }
        return redirect()->route('chucvu.index')->with('success', 'Xoá người dùng thành công');
    }
    return redirect()->route('chucvu.index')->with('success', 'Xoá người dùng ko thành công');
   }
}
