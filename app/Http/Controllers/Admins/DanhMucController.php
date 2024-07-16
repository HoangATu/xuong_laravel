<?php

namespace App\Http\Controllers\Admins;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DanhMucController extends Controller
{
    public $danh_mucs;
    public function __construct(){
        $this->danh_mucs = new DanhMuc();
    }


   public function index(){
    $listDanhMuc = DanhMuc::orderBy('id')->get();
        $title = "Danh sách danh mục";
        return view('admins.danhmucs.index', compact('title', 'listDanhMuc'));
   }

   public function create(){
    return view('admins.danhmucs.create');
   }

   public function store(Request $request){
    if($request->isMethod('POST')){
        $params = $request->except('_token');
        $this->danh_mucs->createDanhMuc($params);
        return redirect()->route('admins.danhmucs.index')->with('success','Thêm danh mục thành công!');
    }
   }
}
