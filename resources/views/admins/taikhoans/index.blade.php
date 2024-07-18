{{-- extends: quy định master layout kế thừa  --}}
@extends('layouts.admin')
{{-- section dùng để định nghĩa nội dung của của section --}}




@section('css')
    {{-- Nơi để các đường dẫn file CSS và thư viện CSS dùng riêng cho trang --}}
    {{-- Hàm asset() dùng để trỏ đường dẫn trong laravel --}}
    <link rel="stylesheet" href="{{asset('assets/admins/css/index.css')}}">
@endsection



@section('content')


    <div class="d-flex justify-content-center container" style="margin-left: 20px;" >
        <div id="description" class="tab-content active mt-4 container">
            <h1 class="d-flex justify-content-center">DANH SÁCH TÀI KHOẢN</h1>
            <a href="{{ route('taikhoan.create')}}"><button class="btn btn-success " >Thêm mới</button></a>

              {{-- HIỂN THỊ THÔNG BÁO --}}
              @if (session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
              
                  
              @endif

            <table class="table table-striped mt-3">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Ảnh đại diện</th>
                    <th>Ngày sinh</th>
                    <th>Số điện thoại</th>
                    <th>Giới tính</th>
                    <th>Địa chỉ</th>
                    <th>Chức vụ</th>
                    <th>Trạng thái</th>
                </tr>
              </thead>
              
    
              <tbody>
                @foreach($listTaiKhoan as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td><img src="{{ Storage::url($user->anh_dai_dien) }}" alt="Ảnh đại diện" width="50px"></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->ngay_sinh }}</td>
                    <td>{{ $user->so_dien_thoai }}</td> 
                    <td>{{ $user->gioi_tinh == 0 ? 'Nam' : 'Nữ' }}</td>
                    <td>{{ $user->dia_chi }}</td>
                    <td>{{ $user->chuc_vu_id == 1 ? 'Admin' : 'Người dùng' }}</td>
                    <td>{{ $user->trang_thai == 0 ? 'Hoạt động' : 'Không hoạt động' }}</td>
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
