<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SERVITES </title>
    <link rel="stylesheet"  href="/css/app.css">
</head>
<body>
<header>
    @yield('header')
</header>

<div class="container">
        @yield('content')
</div>

<!-- Footer -->
<footer class="py-3 bg-dark">
    @yield('footer')
</footer>

</body>
</html>
