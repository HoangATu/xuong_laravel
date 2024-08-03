@extends('layouts.client')

@section('account')
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
                                <li class="breadcrumb-item active" aria-current="page">my-account</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- my account wrapper start -->
    <div class="my-account-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <div class="myaccount-tab-menu nav" role="tablist">
                                        <a href="#dashboad" class="active" data-bs-toggle="tab"><i class="fa fa-dashboard"></i>
                                            Dashboard</a>
                                        <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i>
                                            Orders</a>
                                        
                                        <a href="#payment-method" data-bs-toggle="tab"><i class="fa fa-credit-card"></i>
                                            Payment
                                            Method</a>
                                        <a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i>
                                            Address</a>
                                        <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Account
                                            Details</a>
                                        <form action="{{route('logout')}}" method="POST">
                                            @csrf
                                            <a class='dropdown-item notify-item' >
                                            <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                                            <button type="submit" class="btn"><span><i class="fa fa-sign-out"></i> Logout</span></button>
                                            </a>
                                        </form>
                                    </div>
                                </div>
                                <!-- My Account Tab Menu End -->

                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h5>Dashboard</h5>
                                                <div class="welcome">
                                                    <p>Hello, <strong> {{Auth::user()->name}}</strong></p>
                                                </div>
                                                <p class="mb-0">From your account dashboard. you can easily check &
                                                    view your recent orders, manage your shipping and billing addresses
                                                    and edit your password and account details.</p>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="orders" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h5>Orders</h5>
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Mã đơn hàng</th>
                                                                <th>Ngày đặt</th>
                                                                <th>Trạng thái</th>
                                                                <th>Tổng tiền</th>
                                                                <th>Hành động</th>
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
                                                                </td>
                                                            </tr>
                        
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h5>Payment Method</h5>
                                                <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h5>Billing Address</h5>
                                                <address>
                                                    <p><strong>{{ Auth::user()->name }}</strong></p>
                                                    <p>{{ Auth::user()->dia_chi }}</p>
                                                    <p>Mobile: {{ Auth::user()->so_dien_thoai }}</p>
                                                </address>
                                                <a href="#" class="btn btn-sqr"><i class="fa fa-edit"></i>
                                                    Edit Address</a>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="account-info" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h5>Account Details</h5>
                                                <div class="account-details-form">
                                                    <form action="{{route('index.update', Auth::user()->id)}}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="single-input-item">
                                                            <label for="display-name" class="required">Họ và tên</label>
                                                            <input type="text" id="display-name" name="name" placeholder="Tên của bạn" value="{{ Auth::user()->name }}"/>
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="email" class="required">Email</label>
                                                            <input type="email" id="email" placeholder="Email Address" value="{{ Auth::user()->email }}"/>
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="email" class="required">Số điện thoại</label>
                                                            <input type="number" id="email" name="so_dien_thoai" placeholder="Số điện thoại" value="{{ Auth::user()->so_dien_thoai }}" />
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="" class="required">Địa chỉ</label>
                                                            <input type="text"  name="dia_chi" placeholder="Địa chỉ ..." value="{{ Auth::user()->dia_chi }}"/>
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="" class="required">Ngày sinh</label>
                                                            <input type="date" id="" name="ngay_sinh" placeholder="Địa chỉ ..." value="{{ Auth::user()->ngay_sinh }}"/>
                                                        </div>
                                                        <div class="single-input-item">
                                                            <button class="btn btn-sqr">Save Changes</button>
                                                        </div>
                                                    </form>
                                                        <fieldset>
                                                            <legend>Password change</legend>
                                                            <div class="single-input-item">
                                                                <label for="current-pwd" class="required">Current
                                                                    Password</label>
                                                                <input type="password" id="current-pwd" placeholder="Current Password" />
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="new-pwd" class="required">New
                                                                            Password</label>
                                                                        <input type="password" id="new-pwd" placeholder="New Password" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="confirm-pwd" class="required">Confirm
                                                                            Password</label>
                                                                        <input type="password" id="confirm-pwd" placeholder="Confirm Password" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        
                                                </div>
                                            </div>
                                        </div> <!-- Single Tab Content End -->
                                    </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->
</main>
@endsection