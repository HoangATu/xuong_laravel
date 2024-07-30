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
            <div class="d-flex justify-content-between">
              <a href="{{ route('sanpham.create')}}"><button class="btn btn-success " >Thêm mới</button></a>
              <form class="d-flex" action="{{route('sanpham.index')}}" method="GET">
                  <input type="text" class="form-control" name="search" placeholder="Tìm kiếm ..." value="{{request('search')}}">
                  <button class="btn btn-primary" type="submit">Search</button>
                   
              </form>
            </div>

              {{-- HIỂN THỊ THÔNG BÁO --}}
              @if (session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
              
                  
              @endif

             

            <table class="table table-striped mt-3">
              <thead>
                <tr>
                  
                  <th>Mã Sản Phẩm</th>
                  <th>Tên Sản Phẩm</th>
                  <th>Ảnh Sản Phẩm</th>
                  <th>Giá Phẩm</th>
                  <th>GiáKhuyến Mãi</th>
                  <th>Số Lượng</th>
                  
                  <th>Danh Mục</th>
                  <th>Trạng thái</th>
                  <th>Hoạt động</th>
                </tr>
              </thead>
              
    
              <tbody>
                @foreach ($listSanPham as $item)
                <tr>
                    
                    <td>{{$item->ma_san_pham}}</td>
                    <td>{{$item->ten_san_pham}}</td>
                    <td>
                      <img src="{{Storage::url($item->hinh_anh)}}" width="100px">
                    </td>
                    <td>{{number_format($item->gia)}}</td>
                    <td>{{empty($item->gia_khuyen_mai) ? 0 : $item->gia_khuyen_mai}}</td>
                    <td>{{$item->so_luong}}</td>
                    
                    <td>{{$item->danh_muc_id == 1 ? 'Áo Thun' : 'Quần Jeeans'}}</td>
                    <td>{{$item->trang_thai == 1 ? 'Hiển thị' : 'Ẩn' }}</td>
                    <td>
                      <a href="{{ route('sanpham.edit', $item->id) }}"><button class="btn btn-warning">Sửa</button></a>
                      <form class="d-inline" action="{{ route('sanpham.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bạn có đỒng ý xoá không?')">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger">Xoá</button>
                      </form>
                    </td>
                  </tr>
                
                @endforeach
              </tbody>
            </table>
            {{$listSanPham->links('pagination::bootstrap-5')}};
          
        </div>


        


       
    </div>
</div>
    


   
@endsection

@section('js')
    {{-- Nơi để các đường dẫn file JS và thư viện JS dùng riêng cho trang --}}
   <script src="{{asset('assets/admins/js/list.js')}}"></script>
@endsection
