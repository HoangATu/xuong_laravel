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
            <h1 class="mt-5 d-flex justify-content-center">THÊM MỚI BÌNH LUẬN</h1>
            

                    <form action="{{ route('binhluan.store') }}" method="POST">
                        @csrf
                        {{-- <input type="hidden" name="san_pham_id" value="{{ $product->id }}"> --}}
                        <div>
                            <label for="" class="form-label">Tên:</label>
                            <input type="text" class="form-control" name="tai_khoan_id" required>
                        </div>
                        <div>
                            <label for="" class="form-label">Đánh giá:</label>
                            <select class="form-control" name="danh_gia" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div>
                            <label for="" class="form-label">Bình luận:</label>
                            <textarea class="form-control" name="comment" required></textarea>
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
