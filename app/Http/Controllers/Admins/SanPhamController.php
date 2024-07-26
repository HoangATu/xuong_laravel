<?php

namespace App\Http\Controllers\Admins;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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


    public function index(Request $request)
    {
        $search = $request->input('search');
        // =>>> SỬ DỤNG CHO RAW VÀ QUERY BUILDER
        // láy dữ liệu ra
        // $listSanPham = $this->san_phams->getList();
        $listSanPham = SanPham::query()->when($search, function($query, $search){
            return $query->where('ma_san_pham', 'like', "%{$search}%")
                         ->orwhere('ten_san_pham', 'like', "%{$search}%");
        })->orderBy('id')->paginate(5);
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
        // // Kiểm tra dữ liệu
        // // dd($request->post());
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
        $sanPham = SanPham::findOrFail($id);

        if(!$sanPham){
            return redirect()->route('sanphams.index')->width('error', 'Sản phẩm không tồn tại');
        }

        // sử dụng eloquen


        return view('admins.sanphams.update', compact('sanPham'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->isMethod('PUT')){
            $params = $request->except('_token', '_method');

            $sanPham = SanPham::findOrFail($id);

            // xử lý hình ảnh
            if($request->hasFile('img_san_pham')){
                // Nếu có đẩy hình ảnh thì sẽ xoá hình ảnh cũ và thêm hình ảnh mới
            
                if($sanPham->hinh_anh){
                    // Nếu sản phẩm có ảnh cũ thì tiến hành xoá
                    Storage::disk('public')->delete($sanPham->hinh_anh);
                }

                $params['hinh_anh'] = $request->file('img_san_pham')->store('uploads/sanpham', 'public');

            }else{
                // Nếu ko có hình ảnh thì lấy lại hình ảnh cũ
                $params['hinh_anh'] = $sanPham->hinh_anh;       
            }
            
            // CẬP NHẬT DỮ LIỆU
            $sanPham->update($params);
            return redirect()->route('sanpham.index')->with('success','Cập nhật phẩm thành công!');
        }

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {

        if($request->isMethod('DELETE')){
            $sanPham = SanPham::findOrFail($id);
            if($sanPham){
                $sanPham->delete();
                return redirect()->route('sanpham.index')->with('success', 'Xoá sản phẩm thành công!!');
            }
            return redirect()->route('sanpham.index')->with('error', 'Xoá sản phẩm không thành công!!');
        }

       
    }

    // Viết một phương thức mới
    public function test(){
        dd("đây là một hàm mới");
    }
}
 