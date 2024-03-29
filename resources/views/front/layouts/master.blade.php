<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="{{ url('front/css/heroic-features.css') }}" rel="stylesheet">

</head>

<body>
    @include('front.layouts.navbar')
<!-- Page Content -->
    @yield('content')
<!-- /.container -->


<!-- Bootstrap core JavaScript -->
<script src="{{ url('front/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @stack('scripts')
</body>

</html>
