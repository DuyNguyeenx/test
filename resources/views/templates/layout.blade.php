<!DOCTYPE html>

<html>

<head>

<title>Layout Bootstrap </title>

<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">

</head>

<body>


<!-- Menu -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<a class="navbar-brand" href="#">Logo</a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="navbarNav">

<ul class="navbar-nav">

<li class="nav-item active">

<a class="nav-link" href="{{ route('employee.index')}}">Trang chủ</a>

</li>

<li class="nav-item">

<a class="nav-link" href="#">Giới thiệu</a>

</li>

<li class="nav-item">

<a class="nav-link" href="#">Dịch vụ</a>

</li>

<li class="nav-item">

<a class="nav-link" href="#">Liên hệ</a>

</li>

</ul>

</div>

</nav>


<!-- Nội dung -->

<div class="container mt-4">



@yield('content')

</div>


<!-- Footer -->

<footer class="bg-light text-center mt-4 py-2">

<p></p>

</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#team').on('show.bs.collapse', function(e) {
            $(e.target).prev('a').addClass('active');
        });

        $('#team').on('hide.bs.collapse', function(e) {
            $(e.target).prev('a').removeClass('active');

        });
    });
</script>
<script src="{{asset('libs/input-mask/jquery.inputmask.js')}}"></script>

<script src="{{asset('libs/jquery/dist/jquery.min.js')}}"></script>

<script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>

<script src="{{ asset('bootstrap/css/bootstrap.js') }}"></script>

@yield('script')
</body>

</html>
