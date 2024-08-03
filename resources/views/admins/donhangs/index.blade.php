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

              {{-- HIỂN THỊ THÔNG BÁO --}}
              @if (session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
              
                  
              @endif

            <table class="table table-striped mt-3">
              <thead>
                <tr>
                  <th>Mã đơn hàng</th>
                  <th>Ngày đặt</th>
                  
                  <th>Tổng tiền</th>
                  <th>Trạng thái</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($listDonHang as $item)
                                        
                <tr>
                    <td>{{$item->ma_don_hang}}</td>
                    <td>{{$item->created_at->format('d-m-Y')}}</td>
                   
                    <td>{{number_format($item->tong_tien, 0, '', '.')}} đ</td>
                    <td>
                        <form action="{{route('donhang.update', $item->id)}}" method="POST">
                            
                            @csrf
                            @method('PUT')
                            <select name="trang_thai_don_hang" class="form-select w-75" onchange="confirmSubmit(this)" data-default-value="{{$item->trang_thai_don_hang}}">
                                @foreach ($trangThaiDonHang as $key=>$value)
                                    <option value="{{$key}}"
                                     {{$key == $item->trang_thai_don_hang ? 'selected' : '' }}
                                     {{$key ==  $type_huy_don_hang ? 'disabled' : '' }}
                                        >{{$value}}</option>
                                @endforeach
                            </select>
                        </form>
                    </td>
                    <td>
                        <a href="{{route('donhang.show', $item->id)}}">
                            <i class="mdi mdi-eye text-muted fs-18 rounded-2 border p-1 me-1"></i>
                        </a>
                       @if ($item->trang_thai_don_hang ===  $type_huy_don_hang)
                        <form action="{{route('donhang.destroy', $item->id)}}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có đồng ý xoá không?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-white">  
                                <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1 "></i>
                            </button>
                            </form>
                       @endif
                       
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
   
    <script>
            function confirmSubmit(selectElement) {
        var form = selectElement.form;
        var selectedOption = selectElement.options[selectElement.selectedIndex].text;
        var defaultValue = selectElement.getAttribute('data-default-value');
        if (confirm('Bạn có chắc chắn thay đổi đơn hàng thành "' + selectedOption + '" không?')) {
            form.submit();
        } else {
            selectElement.value = defaultValue;
        }
    }
    </script>
@endsection
