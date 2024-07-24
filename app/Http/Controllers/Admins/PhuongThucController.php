<?php

namespace App\Http\Controllers\Admins;

use App\Models\PhuongThuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhuongThucController extends Controller
{
    public $phuong_thucs;
    public function __construct(){
        $this->phuong_thucs = new PhuongThuc();
    }

    public function index(){
        $listPhuongThuc = PhuongThuc::orderBy('id')->get();
        return view('admins.phuongthucs.index', compact('listPhuongThuc'));
    }

    public function create(){
        return view('admins.phuongthucs.create');
    }

    public function store (Request $request){
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            $this->phuong_thucs->createPhuongThuc($params);
            return redirect()->route('phuongthuc.index')->with('success', 'Thêm phương thức thành công!!');
        }
    }
}
