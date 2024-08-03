@extends('layouts.client')

@section('detail')
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
                                <li class="breadcrumb-item active" aria-current="page">product details</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding pb-0">
        <div class="container">
            <div class="row">
                <!-- product details wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    <div class="pro-large-img img-zoom">
                                        <img src="{{Storage::url($sanPham->hinh_anh)}}" alt="product-details" />
                                    </div>
                                    @foreach ($sanPham->hinhAnhSanPham as $item)
                                    
                                    <div class="pro-large-img img-zoom">
                                        <img src="{{Storage::url($item->hinh_anh)}}" alt="product-details" />
                                    </div>

                                    @endforeach
                                    
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <div class="pro-nav-thumb">
                                        <img src="{{Storage::url($sanPham->hinh_anh)}}" alt="product-details" />
                                    </div>
                                    @foreach ($sanPham->hinhAnhSanPham as $item)
                                    
                                    <div class="pro-nav-thumb">
                                        <img src="{{Storage::url($item->hinh_anh)}}" alt="product-details" />
                                    </div>

                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <div class="manufacturer-name">
                                        <a href="product-details.html">Mã Sản Phẩm : {{$sanPham->ma_san_pham}}</a>
                                    </div>
                                    <h3 class="product-name">{{$sanPham->ten_san_pham}}</h3>
                                    <div class="ratings d-flex">
                                        @if ($review && $review->danh_gia >= 0)
                                            @for ($i = 1; $i <= 5; $i++)
                                                <span>
                                                    <i class="fa {{ $i <= $review->danh_gia ? 'fa-star' : 'fa-star-o' }}"></i>
                                                </span>
                                            @endfor
                                        @else
                                            @for ($i = 1; $i <= 5; $i++)
                                                <span>
                                                    <i class="fa fa-star-o"></i> <!-- Hiển thị ngôi sao trống khi không có đánh giá -->
                                                </span>
                                            @endfor
                                        @endif
                                    
                                        <div class="pro-review">
                                            <span>{{$sanPham->luot_xem}}</span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="price-regular">{{number_format ($sanPham->gia_khuyen_mai, 0, '', '.')}} đ</span>
                                        <span class="price-old"><del>{{number_format ($sanPham->gia,  0, '', '.')}} đ</del></span>
                                    </div>
                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span>Số lượng: {{$sanPham->so_luong}}</span>
                                    </div> 
                                    <p class="pro-desc">Mô tả ngắn: <br> {{$sanPham->mo_ta_ngan}}</p>
                                    <form action="{{route('cart.add')}}" method="POST">
                                        @csrf
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <h6 class="option-title">qty:</h6>
                                            <div class="quantity">
                                                <div class="pro-qty"><input type="text" value="1" name="quantity" id="quantityInput"></div>
                                                <input type="hidden" name="product_id" value="{{$sanPham->id}}">
                                            </div>
                                            <div class="">
                                                <button type="submit" class="btn btn-cart2">Add to cart</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="pro-size">
                                        <h6 class="option-title">size :</h6>
                                        <select class="nice-select">
                                            <option>S</option>
                                            <option>M</option>
                                            <option>L</option>
                                            <option>XL</option>
                                        </select>
                                    </div>
                                    <div class="color-option">
                                        <h6 class="option-title">color :</h6>
                                        <ul class="color-categories">
                                            <li>
                                                <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                            </li>
                                            <li>
                                                <a class="c-darktan" href="#" title="Darktan"></a>
                                            </li>
                                            <li>
                                                <a class="c-grey" href="#" title="Grey"></a>
                                            </li>
                                            <li>
                                                <a class="c-brown" href="#" title="Brown"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="useful-links">
                                        <a href="#" data-bs-toggle="tooltip" title="Compare"><i
                                                class="pe-7s-refresh-2"></i>compare</a>
                                        <a href="#" data-bs-toggle="tooltip" title="Wishlist"><i
                                                class="pe-7s-like"></i>wishlist</a>
                                    </div>
                                    <div class="like-icon">
                                        <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                        <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                        <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details inner end -->

                    <!-- product details reviews start -->
                    <div class="product-details-reviews section-padding pb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-review-info">
                                    <ul class="nav review-tab">
                                        <li>
                                            <a class="active" data-bs-toggle="tab" href="#tab_one">description</a>
                                        </li>
                                        <li>
                                            <a data-bs-toggle="tab" href="#tab_two">information</a>
                                        </li>
                                        <li>
                                            <a data-bs-toggle="tab" href="#tab_three">reviews ({{$reviews->count()}})</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content reviews-tab">
                                        <div class="tab-pane fade show active" id="tab_one">
                                            <div class="tab-one">
                                                <p>{!! $sanPham->mo_ta !!}</p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab_two">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td>color</td>
                                                        <td>black, blue, red</td>
                                                    </tr>
                                                    <tr>
                                                        <td>size</td>
                                                        <td>L, M, S</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="tab_three">
                                            <div class="container">
                                                <h1>{{ $sanPham->name }}</h1>
                                                <div class="reviews">
                                                    <h2>Reviews</h2>
                                                    @foreach ($reviews as $review)
                                                        <div class="review">
                                                            <div class="review-author">
                                                                <img src="{{ $review->taiKhoan->avatar }}" alt="">
                                                                <p>{{ $review->taiKhoan->name }} - {{ $review->ngay_dang }}</p>
                                                            </div>
                                                            <div class="review-content">
                                                                <div class="ratings">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        <span class="{{ $i <= $review->danh_gia ? 'good' : '' }}">
                                                                            <i class="fa fa-star"></i>
                                                                        </span>
                                                                    @endfor
                                                                </div>
                                                                <p>{{ $review->noi_dung }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <form action="{{ route('reviews.store', $sanPham->id) }}" method="POST" class="review-form">
                                                    @csrf
                                                    <input type="hidden" name="san_pham_id" value="{{ $sanPham->id }}">
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span> Your Name</label>
                                                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span> Your Email</label>
                                                            <input type="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span> Your Review</label>
                                                            <textarea class="form-control" name="noi_dung" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span> Rating</label>
                                                            &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                                            <input type="radio" value="1" name="danh_gia" required>
                                                            &nbsp;
                                                            <input type="radio" value="2" name="danh_gia">
                                                            &nbsp;
                                                            <input type="radio" value="3" name="danh_gia">
                                                            &nbsp;
                                                            <input type="radio" value="4" name="danh_gia">
                                                            &nbsp;
                                                            <input type="radio" value="5" name="danh_gia" checked>
                                                            &nbsp;Good
                                                        </div>
                                                    </div>
                                                    <div class="buttons">
                                                        <button class="btn btn-sqr" type="submit">Continue</button>
                                                    </div>
                                                </form>
                                            </div> <!-- end of review-form -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details reviews end -->
                </div>
                <!-- product details wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->

    <!-- related products area start -->
    <section class="related-products section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Related Products</h2>
                        <p class="sub-title">Add related products to weekly lineup</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                        <!-- product item start -->
                        @foreach ($list as $item)
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="{{route('index.reviews', $item->id)}}">
                                    <img class="pri-img" src="{{ Storage::url($item->hinh_anh) }}" alt="product">
                                    <img class="sec-img" src="{{ Storage::url($item->hinh_anh) }}" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>new</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span>10%</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                </div>
                                <form action="{{route('cart.add')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="product_id" value="{{$item->id}}}">
                                    
                                    <div class="cart-hover">
                                        <button class="btn btn-cart">add to cart</button>
                                    </div>
                                </form>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">
                                    <p class="manufacturer-name"><a href="product-details.html"></a></p>
                                </div>
                                <ul class="color-categories">
                                    <li>
                                        <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                    </li>
                                    <li>
                                        <a class="c-darktan" href="#" title="Darktan"></a>
                                    </li>
                                    <li>
                                        <a class="c-grey" href="#" title="Grey"></a>
                                    </li>
                                    <li>
                                        <a class="c-brown" href="#" title="Brown"></a>
                                    </li>
                                </ul>
                                <h6 class="product-name">
                                    <a href="{{route('index.reviews', $item->id)}}">{{$item->ten_san_pham}}</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">{{number_format ($sanPham->gia_khuyen_mai, 0, '', '.')}} đ</span>
                                    <span class="price-old"><del>{{number_format ($sanPham->gia, 0, '', '.')}} đ</del></span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                       
                        <!-- product item end -->

                        
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- related products area end -->
</main> 
@endsection

@section('js')
    <script>
        $('.pro-qty').prepend('<span class="dec qtybtn">-</span>');
        $('.pro-qty').append('<span class="inc qtybtn">+</span>');
        $('.qtybtn').on('click', function () {
            var $button = $(this);
            var $input = $button.parent().find('input');
            var oldValue = parseFloat($input.val());
            if($button.hasClass('inc')) {
                var newVal = oldValue + 1;
            } else {
                if(oldValue > 1){
                    var newVal = oldValue - 1;
                }else{
                    var newVal =  1;
                }
            }
            $input.val(newVal); 
            
        });

        // Sử lý khi ng dùng nhập số âm
        $('#quantityInput').on('change', function(){
            var value = parseInt($(this).val(), 10);
            if(isNaN(value) || value<1) {
                alert('số lượng phải lớn hơn bằng 1');
                $(this).val(1)
            }
        })
    </script>
@endsection