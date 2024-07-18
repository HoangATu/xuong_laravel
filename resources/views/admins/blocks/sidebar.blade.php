<div class="d-flex">
    
    <!-- 2. Bên trái: Menu điều hướng (nav) -->
    <div class="bg-light border-end" style="width: 300px; min-height: calc(100vh - 66px);">
        <!-- Lên w3school copy phần nav về -->
        <ul class="nav nav-pills">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Trang sản phẩm</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('sanpham.index')}}">Danh sách sản phẩm</a></li>
                  <li><a class="dropdown-item" href="{{route('sanpham.create')}}">Thêm sản phẩm</a></li>
                  <li><a class="dropdown-item" href="#">Cập nhật sản phẩm</a></li>
                </ul>
              </li>
        </ul>

        <ul class="nav nav-pills">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Trang danh mục</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('danhmuc.index')}}">Danh sách danh mục</a></li>
                  <li><a class="dropdown-item" href="{{route('danhmuc.create')}}">Thêm danh mục</a></li>
                  <li><a class="dropdown-item" href="#">Cập nhật danh mục</a></li>
                </ul>
              </li>
        </ul>


        <ul class="nav nav-pills">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Trang bình luận</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('binhluan.index')}}">Danh sách bình luận</a></li>
                  <li><a class="dropdown-item" href="{{route('binhluan.create')}}">Thêm bình luận</a></li>
                  <li><a class="dropdown-item" href="#">Cập nhật bình luận</a></li>
                </ul>
              </li>
        </ul>

        <ul class="nav nav-pills">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Trang chức vụ</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('chucvu.index')}}">Danh sách chức vụ</a></li>
                <li><a class="dropdown-item" href="{{route('chucvu.create')}}">Thêm chức vụ</a></li>
                <li><a class="dropdown-item" href="#">Cập nhật bình luận</a></li>
              </ul>
            </li>
      </ul>

      <ul class="nav nav-pills">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Trang tài khoản</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('taikhoan.index')}}">Danh sách tài khoản</a></li>
              <li><a class="dropdown-item" href="{{route('taikhoan.create')}}">Thêm tài khoản</a></li>
              <li><a class="dropdown-item" href="#">Cập nhật bình luận</a></li>
            </ul>
          </li>
    </ul>


    </div>