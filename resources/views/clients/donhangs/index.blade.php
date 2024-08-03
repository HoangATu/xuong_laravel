@extends('layouts.client')
 
@section('cart')
<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">My Order</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                    <form action="{{route('cart.update')}}" method="POST"> 
                        @csrf
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Mã đơn hàng</th>
                                        <th class="pro-title">Ngày đặt</th>
                                        <th class="pro-price">Trạng thái</th>
                                        <th class="pro-quantity">Tổng tiền</th>
                                        <th class="pro-subtotal">Hành động</th>
                                    </tr> 
                                </thead>
                                <tbody>
                                    @foreach ($donHangs as $item)
                                        
                                    <tr>
                                        <td>{{$item->ma_don_hang}}</td>
                                        <td>{{$item->created_at->format('d-m-Y')}}</td>
                                        <td>{{$trangThaiDonHang[$item->trang_thai_don_hang]}}</td>
                                        <td>{{number_format($item->tong_tien, 0, '', '.')}} đ</td>
                                        <td>
                                            <a href="{{route('order.show', $item->id)}}" class="btn btn-sqr">
                                                View
                                            </a>
                                            <form action="{{route('order.update', $item->id)}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                @if ($item->trang_thai_don_hang === $type_cho_xac_nhan)
                                                    <input type="hidden" name="huy_don_hang" value="1">
                                                    <button class="btn btn-sqr bg-danger" type="submit" onclick="return confirm('Bạn có xác nhận huye đơn hàng không?">Huỷ</button>
                                                @elseif($item->trang_thai_don_hang === $type_dang_van_chuyen)
                                                     <input type="hidden" name="da_giao_hang" value="1">
                                                    <button class="btn btn-sqr bg-success" type="submit" onclick="return confirm('Bạn có xác nhận đã nhận đơn hàng?">Đã nhận hàng</button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>

                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                        <!-- Cart Update Option -->
                        {{-- <div class="cart-update-option d-block d-md-flex justify-content-end">
                            
                            <div class="cart-update">
                               <button type="submit" class="btn btn-sqr">Update Cart</button>
                            </div>
                        </div> --}}
                    </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- cart main wrapper end -->
</main>
@endsection

