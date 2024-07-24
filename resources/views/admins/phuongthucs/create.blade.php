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
            <h1 class="mt-5 d-flex justify-content-center">THÊM MỚI PHƯƠNG THỨC</h1>
            <form action="{{ route('phuongthuc.store')}}" method="POST">
                {{-- LÀM VIỆC VỚI FORM TRONG LARAVEL --}}
                {{--
                    CSRF Field: là một trường ẩn bắt buộc phải có trong Form khi sử dụng laravel 
                     --}}
            @csrf
            
            <div class="mb-3 mt-3">
            <label for="" class="form-label">Tên Phương Thức:</label>
            <input type="text" class="form-control" name="ten_phuong_thuc" placeholder="Nhập tên phương thức thanh toán">
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
@endsection
