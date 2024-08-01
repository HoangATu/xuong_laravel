@component('mail::message')
    # Xác nhận đơn hàng

    Xin chào {{$donHang->ten_nguoi_nhan}}, 

    Cảm ơn bạn đã đặt hàng từ cửa hàng của chúng tôi. Đây là thông tin đơn hàng của bạn:

    *** Mã đơn hàng: ** {{$donHang->ma_don_hang}}

    *** Sản phẩm đẫ đặt: **
    @foreach ($donHang->chiTietDonHang as $chiTiet)
        - {{$chiTiet->sanPham->ten_san_pham}} x {{$chiTiet->so_luong}} : {{number_format($chiTiet->thanh_tien)}} VND
        
    @endforeach

    *** Tổng tiền: ** {{number_format($donHang->tong_tien)}} VNĐ

    Chúng tôi sẽ liên hệ với bạn sớm nhất để xác nhận thông tin giao hàng.
    
    Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi!!!

    Trân trọng.
    {{config('app.name')}}
@endcomponent