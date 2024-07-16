{{-- extends: quy định master layout kế thừa  --}}
@extends('layouts.admin')
{{-- section dùng để định nghĩa nội dung của của section --}}




@section('css')
    {{-- Nơi để các đường dẫn file CSS và thư viện CSS dùng riêng cho trang --}}
    {{-- Hàm asset() dùng để trỏ đường dẫn trong laravel --}}
    <link rel="stylesheet" href="{{asset('assets/admins/css/index.css')}}">
@endsection



@section('content')


    <div class="d-flex justify-content-center container" style="margin-left: 50px;" >
        <div id="description" class="tab-content active mt-4 container">
            <h1 class="d-flex justify-content-center">{{$title}}</h1>
            <a href="{{ route('sanpham.create')}}"><button class="btn btn-success " >Thêm mới</button></a>

              {{-- HIỂN THỊ THÔNG BÁO --}}
              @if (session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
              
                  
              @endif

            <table class="table table-striped mt-3">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Mã Sản Phẩm</th>
                  <th>Tên Sản Phẩm</th>
                  <th>Ảnh Sản Phẩm</th>
                  <th>Giá Phẩm</th>
                  <th>Số Lượng</th>
                  <th>Ngày Nhập</th>
                  <th>Danh Mục</th>
                  <th>Trạng thái</th>
                </tr>
              </thead>
              
    
              <tbody>
                @foreach ($listSanPham as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->ma_san_pham}}</td>
                    <td>{{$item->ten_san_pham}}</td>
                    <td>
                      <img src="{{Storage::url($item->hinh_anh)}}" width="100px">
                    </td>
                    <td>{{$item->gia}}</td>
                    <td>{{$item->so_luong}}</td>
                    <td>{{$item->ngay_nhap}}</td>
                    <td>{{$item->danh_muc_id == 1 ? 'Áo Thun' : 'Quần Jeeans'}}</td>
                    <td>{{$item->trang_thai == 1 ? 'Hiển thị' : 'Ẩn' }}</td>
                    <td>
                      <button class="btn btn-warning">Sửa</button>
                      <button class="btn btn-danger">Xoá</button>
                    </td>
                  </tr>
                
                @endforeach
              </tbody>
            </table>
          
          
        </div>


        


       
    </div>
</div>
    


   
@endsection

@section('js')
    {{-- Nơi để các đường dẫn file JS và thư viện JS dùng riêng cho trang --}}
   <script src="{{asset('assets/admins/js/list.js')}}"></script>
@endsection
