<?php

namespace App\Http\Controllers\Admins;

use App\Models\DonHang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Quản lý đơn hàng";
        $listDonHang = DonHang::query()->orderByDesc('id')->get();
        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;
        $type_huy_don_hang = DonHang::HUY_DON_HANG;
        return view('admins.donhangs.index', compact('title','listDonHang', 'trangThaiDonHang', 'type_huy_don_hang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Chi tiết đơn hàng";
        $donHang = DonHang::query()->findOrFail($id);
        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;
        $trangThaiThanhToan = DonHang::TRANG_THAI_THANH_TOAN;
        return view('admins.donhangs.show', compact('title','donHang', 'trangThaiDonHang', 'trangThaiThanhToan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $donHang = DonHang::query()->findOrFail($id);
        $currentTrangThai = $donHang->trang_thai_don_hang;

        $newTrangThai = $request->input('trang_thai_don_hang');
        $trangThais = array_keys(DonHang::TRANG_THAI_DON_HANG);

        // kiểm tra nếu đơn hàng đã huỷ thì ko được thay đổi trạng thái nữa
        if($currentTrangThai === DonHang::HUY_DON_HANG){
            return redirect()->route('donhang.index')->with('errors', 'Đơn hàng đã bị huỷ, không thể thay đổi trạng thái');
        }

        // kiểm tra trạng thái mới ko đc nằm sau trạng thái hiện tại
        if(array_search($newTrangThai, $trangThais) < array_search($currentTrangThai, $trangThais)){
            return redirect()->route('donhang.index')->with('errors', 'Không thể cập nhật ngược lại trạng thái');
        }

        $donHang->trang_thai_don_hang = $newTrangThai;
        $donHang->save();
        return redirect()->route('donhang.index')->with('success', 'Cập nhật trạng thái thành công');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Khi người dùng huỷ đơn hàng mới được xoá (xoá mềm)
        $donHang = DonHang::query()->findOrFail($id);
        if($donHang && $donHang->trang_thai_don_hang === DonHang::HUY_DON_HANG){

            $donHang->chiTietDonHang()->delete();
            $donHang->delete();
        return redirect()->back()->with('success', 'Xoá đơn hàng thành công');
        }
        return redirect()->back()->with('error', 'Xoá đơn hàng không thành công');
    }
}
