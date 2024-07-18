{{-- extends: quy định master layout kế thừa  --}}
@extends('layouts.admin')
{{-- section dùng để định nghĩa nội dung của của section --}}




@section('css')
    {{-- Nơi để các đường dẫn file CSS và thư viện CSS dùng riêng cho trang --}}
    {{-- Hàm asset() dùng để trỏ đường dẫn trong laravel --}}
    <link rel="stylesheet" href="{{asset('assets/admins/css/index.css')}}">
@endsection



@section('content')

    <div class="d-flex container" >
        


        <div id="additional-info" class="tab-content active mt-4 container" style="width: 1000px;">
            <h1 class="mt-5 d-flex justify-content-center">THÊM MỚI NGƯỜI DÙNG</h1>
            <form action="{{ route('taikhoan.store')}}" method="POST" enctype="multipart/form-data">
                {{-- LÀM VIỆC VỚI FORM TRONG LARAVEL --}}
                {{--
                    CSRF Field: là một trường ẩn bắt buộc phải có trong Form khi sử dụng laravel 
                     --}}
                @csrf
                <div class="mb-3 mt-3">
                <label for="" class="form-label">Tên người dùng:</label>
                <input type="text" class="form-control" name="name" >
                </div>
                <div>
                <label for="" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" >
                </div>
                <div>
                    <label for="" class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password" >
                    </div>
                <div class="mb-3 mt-3">
                <label for="text" class="form-label">Ngày sinh:</label>
                <input type="date" class="form-control" name="ngay_sinh">
                </div>
                <div class="mb-3 mt-3">
                <label for="" class="form-label">Số điện thoại:</label>
                <input type="number" class="form-control" name="so_dien_thoai">
                </div>
                <div class="mb-3 mt-3">
                    <label for="" class="form-label">Địa chỉ:</label>
                    <input type="text" class="form-control" name="dia_chi">
                    </div>
                <div>
                    <label for="">Giới tính</label>
                    <select name="gioi_tinh" class="form-select">
                      <option selected value="0">Nam</option>
                      <option value="1">Nữ</option>
                    </select>
                </div>

                <div class="mb-3 mt-3">
                    <label for="" class="form-label">Ảnh đại diện:</label>
                    <input type="file" class="form-control" name="img_nguoi_dung" onchange="showImage(event)">
                </div>
                  
                  <img id="img_user" src="" alt="Hình ảnh người dùng" style="width:200px; display:none;">

                <div class="mb-3 mt-3">
                    <label for="chuc_vu_id">Chức vụ:</label>
                    <select class="form-control" id="chuc_vu_id" name="chuc_vu_id">
                        @foreach($chucVus as $chucVu)
                            <option value="{{ $chucVu->id }}">{{ $chucVu->ten_chuc_vu }}</option>
                        @endforeach
                    </select>
                    
                </div>
                  

                <div>
                  <label for="">Trạng thái</label>
                  <select name="trang_thai" class="form-select">
                    <option selected>Chọn trạng thái</option>
                    <option value="0">Hoạt động</option>
                    <option value="1">Không hoạt động</option>
                  </select>
                </div>
                <div class="mt-3 d-flex justify-content-center">
                  <button type="reset" class="btn btn-outline-secondary me-3">Nhập lại</button>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
            </form>
        </div>


        
    </div>
</div>
    


   
@endsection

@section('js')
    {{-- Nơi để các đường dẫn file JS và thư viện JS dùng riêng cho trang --}}
   <script src="{{asset('assets/admins/js/list.js')}}"></script>
   <script>
    function showImage(event){
      const img_user = document.getElementById('img_user');

      const file = event.target.files[0];

      const reader = new FileReader();

      reader.onload = function () {
        img_user.src = reader.result;
        img_user.style.display = 'block';
      }

      if(file){
        reader.readAsDataURL(file);
      }
    }
 </script>
@endsection
