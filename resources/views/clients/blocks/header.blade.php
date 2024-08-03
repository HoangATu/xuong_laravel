<header class="header-area header-wide">
    <!-- main header start -->
    <div class="main-header d-none d-lg-block">
        <!-- header middle area start -->
        <div class="header-main-area sticky">
            <div class="container">
                <div class="row align-items-center position-relative">
                    <!-- start logo area -->
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="index.html">
                                <img src="{{ asset('assets/clients/img/logo/logo.png')}}" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                    <!-- start logo area -->
                    <!-- main menu area start -->
                    <div class="col-lg-6 position-static">
                        <div class="main-menu-area">
                            <div class="main-menu">
                                <!-- main menu navbar start -->
                                <nav class="desktop-menu">
                                    <ul>
                                        <li><a href="{{ route('index.index') }}">Home</a></li>
                                        <li><a href="{{ route('index.shop') }}">Shop</a></li>
                                        <li class="position-static"><a href="#">Pages</a></li>
                                        <li><a href="blog-left-sidebar.html">Blog</a></li>
                                        <li><a href="contact-us.html">Contact us</a></li>
                                    </ul>
                                </nav>
                                <!-- main menu navbar end -->
                            </div>
                        </div>
                    </div>
                    <!-- main menu area end -->
                    <!-- mini cart area start -->
                    <div class="col-lg-4">
                        <div class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                            <div class="header-search-container">
                                <button class="search-trigger d-xl-none d-lg-block"><i class="pe-7s-search"></i></button>
                                <form class="header-search-box d-lg-none d-xl-block" action="{{route('index.shop')}}" method="GET">
                                    <input type="text" placeholder="Search entire store here" name="search" class="header-search-field" value="{{request('search')}}">
                                    <button type="submit" class="header-search-btn"><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                            <div class="header-configure-area">
                                <ul class="nav justify-content-end">
                                    @if (Auth::check())
                                        <li class="user-hover">
                                            <a href="#">
                                                <i class="pe-7s-user"></i>
                                            </a>
                                            <ul class="dropdown-list">
                                                <li><a href="{{ route('index.account') }}">My Account</a></li>
                                                <li><a href="{{ route('order.index') }}">My Order</a></li>
                                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </ul>
                                        </li>
                                    @else
                                        <li class="user-hover">
                                            <a href="#">
                                                <i class="pe-7s-user"></i>
                                            </a>
                                            <ul class="dropdown-list">
                                                <li><a href="{{ route('index.login') }}">Login</a></li>
                                                <li><a href="{{ route('register') }}">Register</a></li>
                                            </ul>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="{{ route('index.wishlist') }}">
                                            <i class="pe-7s-like"></i>
                                            <div class="notification">0</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('cart.list') }}" class="minicart-btn">
                                            <i class="pe-7s-shopbag"></i>
                                            <div class="notification">{{ session('cart') ? count(session('cart')) : '0' }}</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- mini cart area end -->
                </div>
            </div>
        </div>
        <!-- header middle area end -->
    </div>
    <!-- main header start -->
</header>
