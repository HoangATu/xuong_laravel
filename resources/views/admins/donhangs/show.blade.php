{{-- extends: quy định master layout kế thừa  --}}
@extends('layouts.admin')
{{-- section dùng để định nghĩa nội dung của của section --}}




@section('css')
    {{-- Nơi để các đường dẫn file CSS và thư viện CSS dùng riêng cho trang --}}
    {{-- Hàm asset() dùng để trỏ đường dẫn trong laravel --}}
    <link rel="stylesheet" href="{{asset('assets/admins/css/index.css')}}">
@endsection



@section('content')


    <div class="d-flex justify-content-center container"  >
        <div id="description" class="tab-content active mt-4 container">
            <h1 class="d-flex justify-content-center">{{$title}}</h1>

              {{-- HIỂN THỊ THÔNG BÁO --}}
              @if (session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>

              @endif
 
              <div class="myaccount-content">
                <h5>Thông tin đơn hàng: <span class="text-danger">{{$donHang->ma_don_hang}}</span></h5>
                <div class="welcome">
                    <p>Tên người nhận: <strong>{{$donHang->ten_nguoi_nhan}}</strong></p>
                    <p>Email người nhận: <strong>{{$donHang->email_nguoi_nhan}}</strong></p>
                    <p>Số điện thoại người nhận: <strong>{{$donHang->sdt_nguoi_nhan}}</strong></p>
                    <p>Địa chỉ người nhận: <strong>{{$donHang->dia_chi_nguoi_nhan}}</strong></p>
                    <p>Ngày đặt hàng: <strong>{{$donHang->created_at->format('d-m-Y')}}</strong></p>
                    <p>Ghi chú: <strong>{{$donHang->ghi_chu}}</strong></p>
                    <p>Trạng thái đơn hàng: <strong>{{$trangThaiDonHang[$donHang->trang_thai_don_hang]}}</strong></p>
                    <p>Trạng thái thanh toán: <strong>{{$trangThaiThanhToan[$donHang->trang_thai_thanh_toan]}}</strong></p>
                    <p>Tổng tiền hàng: <strong>{{number_format($donHang->tien_hang, 0, '', '.')}} đ</strong></p>
                    <p>Tổng tiền ship: <strong>{{number_format($donHang->tien_ship, 0, '', '.')}} đ</strong></p>
                    <p>Tổng tiền đơn hàng: <strong>{{number_format($donHang->tong_tien, 0, '', '.')}} đ</strong></p>
                    
                </div>
                
            </div>
            

              
              <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="tab-content" id="myaccountContent">
                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                            <div class="myaccount-content">
                                <h5>Sản phẩm</h5>
                                
                                    <div class="myaccount-content">
                                        
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Mã sản phẩm</th>
                                                        <th>Hình ảnh</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Đơn giá</th>
                                                        <th>Số lượng</th>
                                                        <th>Thành tiền</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($donHang->chiTietDonHang as $item)
                                                        @php
                                                            $sanPham = $item->sanPham;
                                                        @endphp
                                                    
                                                    <tr>
                                                        <td>{{$sanPham->ma_san_pham}}</td>
                                                        <td><img src="{{Storage::url($sanPham->hinh_anh)}}" alt="" width="100px"></td>
                                                        <td>{{$sanPham->ten_san_pham}}</td>
                                                        <td>{{$item->don_gia}}</td>
                                                        <td>{{$item->so_luong}}</td>
                                                        <td>{{$item->thanh_tien}}</td>
                                                    </tr>

                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
          
          
        </div>


        


       
    </div>
</div>
    


   
@endsection

@section('js')
    {{-- Nơi để các đường dẫn file JS và thư viện JS dùng riêng cho trang --}}
   <script src="{{asset('assets/admins/js/list.js')}}"></script>
@endsection
