<?php

namespace App\Http\Controllers\Clients;

use Carbon\Carbon;
use App\Models\SanPham;
use App\Models\GiamGias;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function listCart()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        $subTotal = 0;

        foreach ($cart as $item){
            $subTotal += $item['gia'] * $item['so_luong'];
        }

        $shipping = 30000;

        $discount = 0;
        if (session()->has('coupon')) {
            $discount = session('coupon')->discount_amount;
        }

        $total = $subTotal + $shipping - $discount;

        return view('clients.cart', compact('cart', 'subTotal', 'shipping', 'discount', 'total'));
    }

    public function addCart(Request $request){
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        
        $sanPham = SanPham::findOrFail($productId);
        
        // Khởi tạo một mảng chứa thông tin giỏ hàng trên session
        $cart = session()->get('cart', []);
    
        if (isset($cart[$productId])) {
            // Sản phẩm đã tồn tại trong giỏ hàng
            $cart[$productId]['so_luong'] += $quantity;
        } else {
            // Sản phẩm chưa tồn tại trong giỏ hàng
            $cart[$productId] = [
                'ten_san_pham' => $sanPham->ten_san_pham,
                'gia' => isset($sanPham->gia_khuyen_mai) ? $sanPham->gia_khuyen_mai : $sanPham->gia_san_pham,
                'so_luong' => $quantity,
                'hinh_anh' => $sanPham->hinh_anh,
            ];
        }
    
        session()->put('cart', $cart);
    
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
    }

    public function updateCart(Request $request){
        $cartNew = $request->input('cart', []);
        session()->put('cart', $cartNew);
        return redirect()->back();
    }

    public function applyCoupon(Request $request){
       
            $request->validate([
                'coupon_code' => 'required|string|exists:giam_gias,code'
            ]);
        
            $couponCode = $request->input('coupon_code');
            $coupon = GiamGias::where('code', $couponCode)->first();
        
            if ($coupon) {
                session()->put('coupon_code', $couponCode);
                session()->put('coupon', $coupon);
                return redirect()->route('cart.list')->with('success', 'Mã giảm giá đã được áp dụng!');
            } else {
                return redirect()->route('cart.list')->with('error', 'Mã giảm giá không hợp lệ!');
            }
    }
        
}
