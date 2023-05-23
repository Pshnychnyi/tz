<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showroom</title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- LIBS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- STYLES -->
    <link rel="stylesheet" href="{{asset('assets/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <div class="logo">
            <img src="{{asset('assets/images/logo.svg')}}" alt="Логотип">
        </div>
        <ul class="menu">
            <li><a href="{{route('cars.index')}}"><i class="far fa-folder"></i>Cars</a></li>
            <li><a href="{{route('parts.index')}}"><i class="far fa-folder"></i>Parts</a></li>
        </ul>

        <a class="logout" href="#">Quit</a>
    </div>

    <div class="content">
        <div class="header">
            <div class="user-info">
                <div class="avatar">
                    <img src="{{asset('assets/images/avatar.png')}}" alt="Аватар">
                </div>
                <div class="username">
                    <h3>Surname N</h3>
                    <p>Administrator</p>
                </div>
                <i class="fas fa-sort-down"></i>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @yield('content')

        <footer class="footer">
            <img class="footer__logo" src="{{asset('assets/icons/logo-sm.svg')}}" alt="Logo">
            <span class="footer__text">v 1.01 rel 3 from 11.07.2022</span>
        </footer>
    </div>

</div>



{{--<script src="{{asset('assets/js/main.js')}}"></script>--}}
</body>
</html>
