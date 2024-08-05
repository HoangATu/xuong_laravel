<?php

namespace App\Http\Controllers;

use App\Models\GiamGias;
use Illuminate\Http\Request;

class GiamGiaController extends Controller
{
   public function index(){
        $title = "QUẢN LÝ MÃ GIẢM GIÁ";
        $listMa = GiamGias::orderByDesc('id')->get();
        return view('admins.giamgias.index', compact('listMa', 'title'));
   }

   public function create(){
        return view('admins.giamgias.create');
   }

   public function store(Request $request){
    if($request->isMethod('POST')){
        $params = $request->except('_token');
        GiamGias::create($params);
        return redirect()->route('giamgia')->with('success', 'Thêm mã giảm giá thành công');
    }
   }

   public function destroy($id){
        $giamgia = GiamGias::findOrFail($id);
        $giamgia->delete();
    
        return redirect()->back()->with('success', 'Mã giảm giá đã được xóa thành công.');
   }
}
