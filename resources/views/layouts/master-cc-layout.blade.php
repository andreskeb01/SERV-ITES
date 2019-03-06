<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Servicios ITES - Cómputo</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/base-biblioteca/css/round-about.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
        <img src="/base-biblioteca/images/logo.jpg" height="40" width="100">
        <a class="navbar-brand" href="{{route('centrocomputo')}}">ITES "Rene Descartes"</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @yield('funciones')

    </div>
</nav>

<!-- Page Content -->
<div class="container">
    <div class="">
        @yield('content')
    </div>
</div>
<!-- /.container -->

<!-- Footer -->
<footer>
    @yield('footer')
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('bootstrap/js/jquery.js')}}"></script>
<script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
<script type="text/javascript">
    $.ajaxSetup({
       headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
</script>
<div id="script">
    @yield('script')
</div>
</body>

</html>
