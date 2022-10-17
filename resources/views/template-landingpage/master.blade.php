<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('public/image/logo/logo-mini.png')}}" />
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Tiket Tekadu</title>
    <!--
		CSS
		============================================= -->
    @include('template-landingpage.css')
</head>

<body>

    <!-- Start Header Area -->
    @include('template-landingpage.header')
    <!-- End Header Area -->

    @yield('content')

    <!-- start footer Area -->
    @include('template-landingpage.footer')
    <!-- End footer Area -->

    @include('template-landingpage.js')
</body>

</html>