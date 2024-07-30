<?php

namespace App\Http\Controllers\Admins;

use App\Models\DanhMuc;
use App\Models\HinhAnhSanPham;
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
        $category = DanhMuc::all();
        
        return view('admins.sanphams.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        if($request->isMethod('POST')){
          
            
            $params = $request->except('_token');

            // chuyển đổi checkbox thành boolean
            $params['is_type'] = $request->has('is_type') ? 1 : 0 ;
            $params['is_new'] = $request->has('is_new') ? 1 : 0 ;
            $params['is_hot'] = $request->has('is_hot') ? 1 : 0 ;
            $params['is_hot_deal'] = $request->has('is_hot_deal') ? 1 : 0 ;
            $params['is_show_home'] = $request->has('is_show_home') ? 1 : 0 ;

            
            if ($request->hasFile('img_san_pham')) {
                $filename = $request->file('img_san_pham')->store('uploads/sanpham', 'public');
            } else {
                $filename = null;
            } 

            $params['hinh_anh'] = $filename;
            $sanPham = SanPham::create($params);
            $sanPhamID = $sanPham->id;
            if ($request->hasFile('list_hinh_anh')) {
                foreach ($request->file('list_hinh_anh') as $image) {
                    if ($image) {
                        $path = $image->store('uploads/hinhanhsanpham/id_' . $sanPhamID, 'public');
                        HinhAnhSanPham::create([
                            'san_pham_id' => $sanPhamID,
                            'hinh_anh' => $path,
                        ]);
                    }
                }
            }
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
        $category = DanhMuc::all();

        if(!$sanPham){
            return redirect()->route('sanphams.index')->width('error', 'Sản phẩm không tồn tại');
        }

        // sử dụng eloquen


        return view('admins.sanphams.update', compact('sanPham', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->isMethod('PUT')){
            $params = $request->except('_token', '_method');

            $params['is_type'] = $request->has('is_type') ? 1 : 0 ;
            $params['is_new'] = $request->has('is_new') ? 1 : 0 ;
            $params['is_hot'] = $request->has('is_hot') ? 1 : 0 ;
            $params['is_hot_deal'] = $request->has('is_hot_deal') ? 1 : 0 ;
            $params['is_show_home'] = $request->has('is_show_home') ? 1 : 0 ;


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

            if($request->hasFile('list_hinh_anh')) {
                $currentImages = $sanPham->hinhAnhSanPham->pluck('id')->toArray();
                $arrayCombine = array_combine($currentImages, $currentImages);
                
                foreach ($arrayCombine as $key => $value) {
                    if(!array_key_exists($key, $request->list_hinh_anh)) {
                        $hinhAnhSanPham = HinhAnhSanPham::find($key);
                        if($hinhAnhSanPham && Storage::disk('public')->exists($hinhAnhSanPham->hinh_anh)) {
                            Storage::disk('public')->delete($hinhAnhSanPham->hinh_anh);
                            $hinhAnhSanPham->delete();
                        }
                    }
                }

                foreach ($request->list_hinh_anh as $key=>$image){
                    if(!array_key_exists($key, $arrayCombine)) {
                        if($request->hasFile("list_hinh_anh.$key")) {
                            $path = $image->store('uploads/hinhanhsanphham/id_' . $id,'public');
                            HinhAnhSanPham::create([
                                'san_pham_id' => $id,
                                'hinh_anh' => $path,
                            ]);
                        }
                    } else if(is_file($image) && $request->hasFile("list_hinh_anh.$key")) {
                        $hinhAnhSanPham = HinhAnhSanPham::find($key);
                        if($hinhAnhSanPham && Storage::disk('public')->exists($hinhAnhSanPham->hinh_anh)) {
                            Storage::disk('public')->delete($hinhAnhSanPham->hinh_anh);
                        }
                            $path = $image->store('uploads/hinhanhsanphham/id_' . $id,'public');
                            $hinhAnhSanPham->update([
                                'hinh_anh' => $path,
                            ]);
                        }
                    }
            }
            
            // CẬP NHẬT DỮ LIỆU
            $sanPham->update($params);
            return redirect()->route('sanpham.index')->with('success','Cập nhật san phẩm thành công!');
        }

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {

        if($request->isMethod('DELETE')){
            $sanPham = SanPham::findOrFail($id);
            if($sanPham->hinh_anh && Storage::disk('public')->exitsts($sanPham->hinh_anh)){
                Storage::disk('public')->delete($sanPham->hinh_anh);
            }
            $sanPham->hinhAnhSanPham()->delete();
            $path = 'uploads/hinhanhsanphham/id_' . $id;
            if(Storage::disk('public')->exists($path)){
                Storage::disk('public')->deleteDirectory($path);
            }
            $sanPham->delete();
            return redirect()->route('sanpham.index')->with('success','Xoa san phẩm thành công!');
        } 
    }

    // Viết một phương thức mới
    public function test(){
        dd("đây là một hàm mới");
    }
}
 