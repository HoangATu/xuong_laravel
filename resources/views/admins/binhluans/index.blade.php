{{-- extends: quy định master layout kế thừa  --}}
@extends('layouts.admin')
{{-- section dùng để định nghĩa nội dung của của section --}}




@section('css')
    {{-- Nơi để các đường dẫn file CSS và thư viện CSS dùng riêng cho trang --}}
    {{-- Hàm asset() dùng để trỏ đường dẫn trong laravel --}}
    <link rel="stylesheet" href="{{asset('assets/admins/css/index.css')}}">
@endsection



@section('content')


    <div class="d-flex justify-content-center container" style="margin-left: 50px; width:1000px;" >
        <div id="description" class="tab-content active mt-4 container">
            <h1 class="d-flex justify-content-center">DANH SÁCH BÌNH LUẬN</h1>
            <a href="{{ route('binhluan.create')}}"><button class="btn btn-success " >Thêm mới</button></a>

              {{-- HIỂN THỊ THÔNG BÁO --}}
              

            <table class="table table-striped mt-3">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Tài khoản</th>
                  <th>Nội dung</th>
                  <th>Ngày đăng</th>
                  <th>Đánh giá</th>
                 
                </tr>
              </thead>
              
    
              <tbody>
                @foreach ($listBinhLuan as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->tai_khoan_id}}</td>
                    <td>{{$item->noi_dung}}</td>
                    <td>{{$item->ngay_dang}}</td>
                    <td>{{$item->danh_gia}}</td>
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
