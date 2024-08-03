<?php

namespace App\Http\Controllers\Admins;

use App\Models\SanPham;
use App\Models\BinhLuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BinhLuanController extends Controller
{
    // public $binh_luans;
    // public function __construct(){
    //     $this->binh_luans = new BinhLuan();
    // }

    // public function index($sanPhamId)
    // {
    //     $sanPham = SanPham::findOrFail($sanPhamId);
    //     $reviews = BinhLuan::where('san_pham_id', $sanPhamId)->get();
    //     return view('clients.detail', compact('sanPham', 'reviews'));
    // }

    public function store(Request $request)
    {
        $request->validate([
            'san_pham_id' => 'required|integer|exists:san_phams,id',
            'noi_dung' => 'required|string',
            'danh_gia' => 'required|integer|min:1|max:5',
        ]);

        $review = new BinhLuan();
        $review->san_pham_id = $request->input('san_pham_id');
        $review->tai_khoan_id = auth()->id(); // Assuming user is authenticated
        $review->noi_dung = $request->input('noi_dung');
        $review->danh_gia = $request->input('danh_gia');
        $review->ngay_dang = now();
        $review->save();

        return redirect()->back()->with('success', 'Review submitted successfully!');
    
    }

    
}
