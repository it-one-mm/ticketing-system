<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IT ONE MM - @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset("vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset("css/blog-home.css") }}" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
@include('includes.nav')

<!-- Page Content -->
<div class="container">

    @yield('content')

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; IT ONE MM 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset("vendor/jquery/jquery.min.js") }}"></script>
<script src="{{ asset("vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>

</body>

</html>
