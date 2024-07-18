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
            <h1 class="mt-5 d-flex justify-content-center">CẬP NHẬT SẢN PHẨM</h1>
            <form action="{{ route('sanpham.update', $sanPham->id)}}" method="POST" enctype="multipart/form-data">
                {{-- LÀM VIỆC VỚI FORM TRONG LARAVEL --}}
                {{--
                    CSRF Field: là một trường ẩn bắt buộc phải có trong Form khi sử dụng laravel 
                     --}}
                @csrf
                @method('PUT')
                <div class="mb-3 mt-3">
                <label for="" class="form-label">Mã Sản Phẩm:</label>
                <input type="text" class="form-control" name="ma_san_pham" placeholder="Nhập mã sản phẩm" value="{{$sanPham->ma_san_pham}}">
                </div>
                <div>
                <label for="" class="form-label">Tên Sản Phẩm:</label>
                <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập tên sản phẩm" value="{{$sanPham->ten_san_pham}}">
                </div>
                <div class="mb-3 mt-3">
                <label for="" class="form-label">Giá Sản Phẩm:</label>
                <input type="number" class="form-control" name="gia" min="1" value="{{$sanPham->gia}}">
                </div>
                <div class="mb-3 mt-3">
                <label for="text" class="form-label">Số Lượng:</label>
                <input type="text" class="form-control" name="so_luong" value="{{$sanPham->so_luong}}">
                </div>
                <div class="mb-3 mt-3">
                <label for="text" class="form-label">Ngày Nhập:</label>
                <input type="date" class="form-control" name="ngay_nhap" value="{{$sanPham->ngay_nhap}}">
                </div>

                <div class="mb-3 mt-3">
                    <label for="" class="form-label">Hình ảnh:</label>
                    <input type="file" class="form-control" name="img_san_pham" onchange="showImage(event)">
                    </div>
                  
                  <img id="img_product" src="" alt="Hình ảnh sản phẩm" style="width:200px;">
                  
                
                <div>
                  <label for="">Mô tả:</label>
                  <textarea name="mo_ta" id="" cols="30" rows="3" class="form-control">{{$sanPham->mo_ta}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Danh mục</label>
                    <select class="form-control"  name="danh_muc_id" >
                        <option value="">Chọn danh mục</option>
                        <option  value="1" {{$sanPham->danh_muc_id == '1' ? 'selected' : ''}}>Áo Thun</option>
                        <option  value="2" {{$sanPham->danh_muc_id == '2' ? 'selected' : ''}}>Quần Jeans</option>
                    </select>
                </div>

                <div>
                    <label for="">Trạng thái</label>
                    <select name="trang_thai" class="form-select">
                      
                      <option  value="0" {{$sanPham->trang_thai == '0' ? 'selected' : ''}}>Ẩn</option>
                      <option  value="1" {{$sanPham->trang_thai == '1' ? 'selected' : ''}}>Hiển Thị</option>
  
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
      const img_product = document.getElementById('img_product');

      const file = event.target.files[0];

      const reader = new FileReader();

      reader.onload = function () {
        img_product.src = reader.result;
        img_product.style.display = 'block';
      }

      if(file){
        reader.readAsDataURL(file);
      }
    }
 </script>
@endsection
