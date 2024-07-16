<?php

namespace App\Http\Controllers\Admins;

use App\Models\BinhLuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BinhLuanController extends Controller
{
    public $binh_luans;
    public function __construct(){
        $this->binh_luans = new BinhLuan();
    }


    public function index(){
        $listBinhLuan = BinhLuan::orderBy('id')->get();
        return view('admins/binhluans/index', compact('listBinhLuan'));
    }

    public function create(){
        return view('admins.binhluans.create');
    }

    public function store(Request $request){
        if($request->isMethod('POST')){
        $params = $request->except('_token');
        BinhLuan::create($params);
        return redirect()->route('danhmuc.index');
        }
    }
}
