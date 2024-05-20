<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    @yield('title')
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet"> -->

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/admin123.css')}}" rel="stylesheet">
</head>
<body>
    <div id="title1">
        <div class="feature">
            <h3>
                <?php
                    $name = Auth::user()->name;
                    if($name){
                        echo $name;
                    }
                ?>
            </h3>
            
            <a href="{{route('logout_auth')}}">
                <i class="fa fa-power-off" style="font-size:20px;color:rgb(48, 130, 198)"></i>Đăng xuất
            </a>
        </div>
        <div class="tieude">
          
            <h1>Hệ quản trị nội dung</h1>
        </div>
    </div>
    <hr style="border: 2px solid blue;">
    <hr style="border: 2px solid red;margin-top: 5px;">
    
    <div class="content_admin">
        @include('admin.partials.navbar')
        <div id="page2">
        @yield('content')
        </div>
    </div>

</body>
<script src="js/admin.js"></script>

    </script>

</html>