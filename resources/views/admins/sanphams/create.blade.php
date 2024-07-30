@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/admins/css/index.css')}}">
    <link href="{{asset('assets/admins/libs/quill/quill.core.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admins/libs/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admins/libs/quill/quill.bubble.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="d-flex container">
        <div id="additional-info" class="tab-content active mt-4 container" style="width: 1000px;">
            <h1 class="mt-5 d-flex justify-content-center">THÊM MỚI SẢN PHẨM</h1>
            <form action="{{ route('sanpham.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="" class="form-label">Mã Sản Phẩm:</label>
                    <input type="text" class="form-control" name="ma_san_pham" placeholder="Nhập mã sản phẩm">
                </div>
                <div>
                    <label for="" class="form-label">Tên Sản Phẩm:</label>
                    <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập tên sản phẩm">
                </div>
                <div class="mb-3 mt-3">
                    <label for="" class="form-label">Giá Sản Phẩm:</label>
                    <input type="number" class="form-control" name="gia" min="1">
                </div>
                <div class="mb-3 mt-3">
                    <label for="" class="form-label">Giá Khuyến Mãi:</label>
                    <input type="number" class="form-control" name="gia_khuyen_mai" min="1">
                </div>
                <div class="mb-3 mt-3">
                    <label for="" class="form-label">Số Lượng:</label>
                    <input type="number" class="form-control" name="so_luong">
                </div>
                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Ngày Nhập:</label>
                    <input type="date" class="form-control" name="ngay_nhap">
                </div>
                <div>
                    <label for="">Mô tả ngắn</label>
                    <textarea name="mo_ta_ngan" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Category</label>
                    <select class="form-select"  name="danh_muc_id">
                        <option value="">Chọn danh mục</option>
                        @foreach ($category as $categorys)
                            <option value="{{ $categorys->id }}">{{ $categorys->ten_danh_muc }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Trạng thái</label>
                    <select name="trang_thai" class="form-select">
                        <option selected>Chọn trạng thái</option>
                        <option value="0">Ẩn</option>
                        <option value="1">Hiển Thị</option>
                    </select>
                </div>
                <div class="form-switch d-flex justify-content-between">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" role="switch" id="is_new" name="is_new" checked>
                        <label class="form-check-label" for="is_new">New</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" role="switch" id="is_hot" name="is_hot" checked>
                        <label class="form-check-label" for="is_hot">Hot</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" role="switch" id="is_hot_deal" name="is_hot_deal" checked>
                        <label class="form-check-label" for="is_hot_deal">Hot deal</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" role="switch" id="is_show_home" name="is_show_home" checked>
                        <label class="form-check-label" for="is_show_home">Show home</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Mô tả chi tiêt sản phẩm</label>
                    <div id="quill-editor" style="height: 400px;"></div>
                    <textarea name="mo_ta" id="noi_dung_content" cols="30" class="d-none"></textarea>
                </div>
                <div class="mb-3 mt-3">
                    <label for="" class="form-label">Hình ảnh:</label>
                    <input type="file" class="form-control" name="img_san_pham" onchange="showImage(event)">
                    <img id="img_product" src="" alt="Hình ảnh sản phẩm" style="width:200px; display:none;">
                </div>
                <div class="mb-3">
                    <label for="" class="form-control">Album hình ảnh</label>
                    <i id="add-row" class="mdi mdi-plus text-muted fs-18 rounded-2 border p-1" style="cursor: pointer"></i>
                    <table class="table align-middle table-nowrap mb-0">
                        <tbody id="image-table-body">
                            <tr>
                                <td class="d-flex align-items-center">
                                    <img id="preview_0" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0Wr3oWsq6KobkPqznhl09Wum9ujEihaUT4Q&s" alt="Hình ảnh sản phẩm" style="width:50px;" class="me-3">
                                    <input type="file" class="form-control" id="hinh_anh" name="list_hinh_anh[id_0]" onchange="previewImage(this, 0)">
                                </td>
                                <td>
                                    <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1" style="cursor: pointer" onclick="removeRow(this)"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 d-flex justify-content-center">
                    <button type="reset" class="btn btn-outline-secondary me-3">Nhập lại</button>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/admins/js/list.js')}}"></script>
    <script src="{{asset('assets/admins/libs/quill/quill.core.js')}}"></script>
    <script src="{{asset('assets/admins/libs/quill/quill.min.js')}}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quill = new Quill("#quill-editor", {
                theme: "snow",
            });

            var old_content = `{!! old('mo_ta') !!}`;
            quill.root.innerHTML = old_content;

            quill.on('text-change', function() {
                var html = quill.root.innerHTML;
                document.getElementById('noi_dung_content').value = html;
            });
        });

        function showImage(event) {
            const img_product = document.getElementById('img_product');
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function() {
                img_product.src = reader.result;
                img_product.style.display = 'block';
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            var rowCount = 1;

            document.getElementById('add-row').addEventListener('click', function() {
                var tableBody = document.getElementById('image-table-body');
                var newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td class="d-flex align-items-center">
                        <img id="preview_${rowCount}" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0Wr3oWsq6KobkPqznhl09Wum9ujEihaUT4Q&s" alt="Hình ảnh sản phẩm" style="width:50px;" class="me-3">
                        <input type="file" class="form-control" name="list_hinh_anh[id_${rowCount}]" onchange="previewImage(this, ${rowCount})">
                    </td>
                    <td>
                        <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1" style="cursor: pointer" onclick="removeRow(this)"></i>
                    </td>`;
                tableBody.appendChild(newRow);
                rowCount++;
            });
        });

        function previewImage(input, rowIndex) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(event) {
                    document.getElementById(`preview_${rowIndex}`).setAttribute('src', event.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeRow(icon) {
            var row = icon.closest('tr');
            row.parentNode.removeChild(row);
        }
    </script>
@endsection
