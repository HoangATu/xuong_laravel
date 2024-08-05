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
            <h1 class="mt-5 d-flex justify-content-center">THÊM MỚI MÃ GIẢM GIÁ</h1>
            <form action="{{ route('giamgia.store')}}" method="POST">
                {{-- LÀM VIỆC VỚI FORM TRONG LARAVEL --}}
                {{--
                    CSRF Field: là một trường ẩn bắt buộc phải có trong Form khi sử dụng laravel 
                     --}}
            @csrf
            
            <div class="mb-3 mt-3">
            <label for="" class="form-label">Tên Mã Giảm Giá:</label>
            <input type="text" class="form-control" name="code" placeholder="Nhập tên mã">
            </div>

            <div class="mb-3 mt-3">
                <label for="" class="form-label">Số Tiền Giảm Giá:</label>
                <input type="number" class="form-control" name="discount_amount" placeholder="Nhập số tiền">
            </div>

            <div class="mb-3 mt-3">
                <label for="" class="form-label">Ngày Hết Hạn:</label>
                <input type="date" class="form-control" name="expiry_date" >
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
