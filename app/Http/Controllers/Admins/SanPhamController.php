<?php

namespace App\Http\Controllers\Admins;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // C1: SỬ DỤNG RAW VÀ QUERY BUILDER
    public $san_phams;
    public $danh_mucs;
    public function __construct(){
        $this->san_phams = new SanPham();
        $this->danh_mucs = new DanhMuc();
    }

    
    // =>>> SỬ DỤNG CHO RAW VÀ QUERY BUILDER


    // C2: SỬ DỤNG ELOQUENT


    public function index()
    {
        // =>>> SỬ DỤNG CHO RAW VÀ QUERY BUILDER
        // láy dữ liệu ra
        // $listSanPham = $this->san_phams->getList();
        $listSanPham = SanPham::orderBy('id')->get();
        $title = "Danh sách sản phẩm";
        return view('admins.sanphams.index', compact('title', 'listSanPham'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DanhMuc::all();
        
        return view('admins.sanphams.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Kiểm tra dữ liệu
        // dd($request->post());
        if($request->isMethod('POST')){
            // VÌ CÓ TRƯỜNG $TOKEN RO CSRF SINH RA NÊN TRƯỚC KHI GỬI DỮ LIỆU TA CẦN LOẠI BỎ TOKEN
            // CÁCH 1

            // LẤY RA DỮ LIỆU
            // $params = $request->post();
            // unset($params['_token']);

            // CÁCH 2
            
            $params = $request->except('_token');

            
            if ($request->hasFile('img_san_pham')) {
                $filename = $request->file('img_san_pham')->store('uploads/sanpham', 'public');
            } else {
                $filename = null;
            } 

            $params['hinh_anh'] = $filename;

            // THÊM DỮ LIỆU
            // sử dụng query builder
            // $this->san_phams->createProduct($params);

            // sử dụng eloquen
            SanPham::create($params);

            // chuyển trang và hiển thị thông báo
            return redirect()->route('sanpham.index')->with('success','Thêm sản phẩm thành công!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admins.sanphams.update');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Viết một phương thức mới
    public function test(){
        dd("đây là một hàm mới");
    }
}
