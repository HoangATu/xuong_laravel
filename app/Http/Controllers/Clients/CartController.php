<?php

namespace App\Http\Controllers\Clients;

use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function listCart()
    {
        // session()->put('cart', []);
        $cart = session()->get('cart', []);
        $total = 0;
        $subToTal = 0;  

        foreach ($cart as $item){
            $subToTal += $item['gia'] * $item['so_luong'];
        }

        $shipping = 30000;

        $total = $subToTal + $shipping;
        return view('clients.cart', compact('cart', 'subToTal', 'shipping', 'total'));
    }

    public function addCart(Request $request){
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        
        $sanPham = SanPham::findOrFail($productId);
        
        // Khởi tạo một mảng chứa thông tin giỏ hàng trên session
        $cart = session()->get('cart', []);
    
        if(isset($cart[$productId])){
            // Sản phẩm đã tồn tại trong giỏ hàng
            $cart[$productId]['so_luong'] += $quantity;
        }else{
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
}
