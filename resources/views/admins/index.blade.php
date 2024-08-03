@extends('layouts.admin')

@section('thongke')
     
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Ecommerce</h4>
                </div>
            </div>

            <!-- start row -->
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="row g-3">

                        <div class="col-md-3 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="d-flex align-items-center">
                                                <div class="fs-14 mb-1 text-muted">Đơn hàng đã đặt hôm nay</div>
                                            </div>

                                            <div class="d-flex align-items-baseline mb-0">
                                                <div class="fs-20 mb-0 me-2 fw-semibold text-dark">{{$homNay}}</div>
                                            </div>
                                        </div>

                                        <div class="col-6 d-flex justify-content-center align-items-center">
                                            <div id="new-orders" class="apex-charts"></div>
                                        </div>
                                    </div>

                                    <p class="d-flex align-content-center border-top mb-0 pt-3 mt-3">
                                        <span class="me-2 d-flex align-content-center fw-medium {{ $statusClass }}">
                                            {{ $tile }}%
                                            <i data-feather="{{ $trendIcon }}" class="ms-2" style="height: 22px; width: 22px;"></i>
                                        </span>
                                        <span class="fw-medium me-1 d-flex">{{ $statusText }}</span>Đơn Hàng
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="d-flex align-items-center">
                                                <div class="fs-14 mb-1 text-muted">Số lượng đã bán hôm nay</div>
                                            </div>

                                            <div class="d-flex align-items-baseline mb-0">
                                                <div class="fs-20 mb-0 me-2 fw-semibold text-dark">{{$totalSoLuong}}</div>
                                            </div>
                                        </div>

                                        <div class="col-6 d-flex justify-content-center align-items-center">
                                            <div id="sales-report" class="apex-charts"></div>
                                        </div>
                                    </div>

                                    <p class="d-flex align-content-center border-top mb-0 pt-3 mt-3">
                                        <span class="me-2 d-flex align-content-center fw-medium {{ $statusClass }}">
                                            {{ $tileSoLuong }}%
                                            <i data-feather="{{ $trendIcon }}" class="ms-2" style="height: 22px; width: 22px;"></i>
                                        </span>
                                        <span class="fw-medium me-1 d-flex">{{ $statusText }}</span> Số Lượng
                                    </p>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="d-flex align-items-center">
                                                <div class="fs-14 mb-1 text-muted">Doanh Thu Hôm Nay</div>
                                            </div>

                                            <div class="d-flex align-items-baseline mb-0">
                                                <div class="fs-20 mb-0 me-2 fw-semibold text-dark">{{number_format($totalTien,  0, '', '.')}}VNĐ</div>
                                            </div>
                                        </div>

                                        <div class="col-6 d-flex justify-content-center align-items-center">
                                            <div id="revenue" class="apex-charts"></div>
                                        </div>
                                    </div>

                                    <p class="d-flex align-content-center border-top mb-0 pt-3 mt-3">
                                        <span class="me-2 d-flex align-content-center fw-medium {{ $statusClass }}">
                                            {{ $tileTien }}%
                                            <i data-feather="{{ $trendIcon }}" class="ms-2" style="height: 22px; width: 22px;"></i>
                                        </span>
                                        <span class="fw-medium me-1 d-flex">{{ $statusText }}</span> Doanh Thu Ngày
                                    </p>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="d-flex align-items-center">
                                                <div class="fs-14 mb-1 text-muted">Doanh Thu Tháng</div>
                                            </div>

                                            <div class="d-flex align-items-baseline mb-0">
                                                <div class="fs-20 mb-0 me-2 fw-semibold text-dark">{{number_format($totalThang, 0, '', '.')}}VNĐ</div>
                                            </div>
                                        </div>

                                        <div class="col-6 d-flex justify-content-center align-items-center">
                                            <div id="expenses" class="apex-charts"></div>
                                        </div>
                                    </div>

                                    <p class="d-flex align-content-center border-top mb-0 pt-3 mt-3">
                                        <span class="me-2 d-flex align-content-center fw-medium {{ $statusClass }}">
                                            {{ $formattedPercentageChange }}%
                                            <i data-feather="{{ $trendIcon }}" class="ms-2" style="height: 22px; width: 22px;"></i>
                                        </span>
                                        <span class="fw-medium me-1 d-flex">{{ $statusText }}</span>Doanh Thu Tháng
                                    </p>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div> <!-- end sales -->
            </div> <!-- end row -->


            <!-- Sales Chart -->
            <div class="row">
                <div class="col-md-12 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                    <i data-feather="git-commit" class="widgets-icons"></i>
                                </div>
                                <h5 class="card-title mb-0">Sales Report</h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <div id="chart-money" class="apex-charts"></div>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                    <i data-feather="pie-chart" class="widgets-icons"></i>
                                </div>
                                <h5 class="card-title mb-0">Sales by Country</h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <div id="sales-country" class="apex-charts"></div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- <div class="row">
                <!-- Top Selling Products -->
                <div class="col-md-6 col-xl-4">
                    <div class="card">

                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                    <i data-feather="cpu" class="widgets-icons"></i>
                                </div>
                                <h5 class="card-title mb-0">Top Selling Products</h5>
                            </div>
                        </div>

                        <!-- start card body -->
                        <div class="card-body">
                            <ul class="list-group custom-group">
                                <li class="list-group-item align-items-center d-flex justify-content-between">
                                    <div class="product-list">
                                        <img class="avatar-md p-1 rounded-circle bg-primary-subtle img-fluid me-3" src="assets/images/products/shoes.jpg" alt="product-image">

                                        <div class="product-body align-self-center">
                                            <h6 class="m-0 fw-semibold">Nike Shoes</h6>
                                            <p class="mb-0 mt-1 text-muted">Fashion</p>
                                        </div>
                                    </div>

                                    <div class="product-price">
                                        <h6 class="m-0 fw-semibold">$990</h6>
                                        <p class="mb-0 mt-1 text-muted">10 Sold</p>
                                    </div>
                                </li>

                                <li class="list-group-item align-items-center d-flex justify-content-between border-bottom">
                                    <div class="product-list">
                                        <img class="avatar-md p-1 rounded-circle bg-primary-subtle img-fluid me-3" src="assets/images/products/bags.jpg" alt="product-image">

                                        <div class="product-body align-self-center">
                                            <h6 class="m-0 fw-semibold">Shoulder Bag</h6>
                                            <p class="mb-0 mt-1 text-muted">Fashion</p>
                                        </div>
                                    </div>

                                    <div class="product-price">
                                        <h6 class="m-0 fw-semibold">$650</h6>
                                        <p class="mb-0 mt-1 text-muted">11 Sold</p>
                                    </div>
                                </li>

                                <li class="list-group-item align-items-center d-flex justify-content-between border-bottom">
                                    <div class="product-list">
                                        <img class="avatar-md p-1 rounded-circle bg-primary-subtle img-fluid me-3" src="assets/images/products/dresses.jpg" alt="product-image">

                                        <div class="product-body align-self-center">
                                            <h6 class="m-0 fw-semibold">Velvet Red Dresse</h6>
                                            <p class="mb-0 mt-1 text-muted">Fashion</p>
                                        </div>
                                    </div>

                                    <div class="product-price">
                                        <h6 class="m-0 fw-semibold">$480</h6>
                                        <p class="mb-0 mt-1 text-muted">08 Sold</p>
                                    </div>
                                </li>

                                <li class="list-group-item align-items-center d-flex justify-content-between border-bottom">
                                    <div class="product-list">
                                        <img class="avatar-md p-1 rounded-circle bg-primary-subtle img-fluid me-3" src="assets/images/products/headphone.jpg" alt="product-image">

                                        <div class="product-body align-self-center">
                                            <h6 class="m-0 fw-semibold">Fashion dresse</h6>
                                            <p class="mb-0 mt-1 text-muted">Fashion</p>
                                        </div>
                                    </div>

                                    <div class="product-price">
                                        <h6 class="m-0 fw-semibold">$1500</h6>
                                        <p class="mb-0 mt-1 text-muted">14 Sold</p>
                                    </div>
                                </li>
                            </ul>
                        </div> 
                        <!-- end card body -->
                    </div>
                </div>

                <!-- Top Selling Products -->
                <div class="col-md-6 col-xl-8">
                    <div class="card">

                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                    <i data-feather="bar-chart" class="widgets-icons"></i>
                                </div>
                                <h5 class="card-title mb-0">Repeat Customer Rate</h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <div id="repeat-customer" class="apex-charts"></div>
                        </div>

                    </div>
                </div>
            </div> --}}

            <div class="row">
                <div class="col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                    <i data-feather="crosshair" class="widgets-icons"></i>
                                </div>
                                <h5 class="card-title mb-0">Đặt Hàng Gần Đây</h5>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-traffic mb-0">

                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Customer</th>
                                            <th>Items</th>
                                            <th>Price</th>
                                            <th>Created</th>
                                            <th>Phone</th>
                                            <th colspan="2">Status</th>
                                        </tr>
                                    </thead>
                                    @foreach ($listDonHang as $item)
                                        
                                    <tr>
                                        <td>
                                            <a href="javascript:void(0);" class="text-reset">#{{$item->id}}</a>
                                        </td>
                                        <td class="d-flex align-items-center">
                                            <img src="{{ asset('assets/admins/images/users/user-12.jpg')}}" class="avatar avatar-sm rounded-2 me-3" />
                                            <p class="mb-0 fw-medium">{{$item->ten_nguoi_nhan}}</p>
                                        </td>
                                        <td>
                                            <p class="mb-0"></p>
                                        </td>
                                        <td>
                                            <p class="mb-0">{{number_format($item->tong_tien, 0, '', '.')}}đ</p>
                                        </td>
                                        <td>
                                            <p class="mb-0">{{$item->created_at->format('d-m-Y')}}</p>
                                        </td>
                                        <td>
                                            <p class="mb-0">{{$item->sdt_nguoi_nhan}}</p>
                                        </td>
                                        {{-- <td>
                                            <p class="text-danger mb-0">Cancelled</p>
                                        </td> --}}
                                        <td>                                                       
                                            <a href="#"><i class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i></a>
                                            <a href="#"><i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div> <!-- content -->
@endsection