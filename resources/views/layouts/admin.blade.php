<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Nơi để các đường dẫn file CSS và thư viện CSS dùng chung cho cả trang layout --}}
    @yield('css')
</head>
<body>
    <header>
        @include('admins.blocks.header')
    </header>


    <main>
        
        @include('admins.blocks.sidebar')
        
        <section>
                {{-- yield chỉ định section có tên trong yield được hiển thị --}}
                @yield('content')
                
        </section>
        
    </main>


    <footer>
        @include('admins.blocks.footer')
    </footer>

   
    {{-- Nơi để các đường dẫn file JS và thư viện JS dùng chung cho cả trang layout --}}

    @yield('js')


</body>
</html>