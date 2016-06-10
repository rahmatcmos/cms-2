<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@if (trim($__env->yieldContent('title'))) @yield('title') - Beyond Plus CMS @endif Beyond Plus CMS </title>
    
    <link rel="stylesheet" type="text/css" href="{{ asset("/node_modules/bootstrap/dist/css/bootstrap.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("/assets/business_landing/css/main.css") }}">
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
   
    <style >
    //div {border:1px solid blue;} </style>
</head>
<body>

    <!-- Header -->

    @include('theme.business_landing.layouts.header')

    <!-- Sidebar -->
   <!-- @1include('layouts/business_landing/slider')  -->

    @yield('content')

    <!-- Footer -->
    @include('theme.business_landing.layouts.footer')


<!-- REQUIRED JS SCRIPTS -->

        
    <script src="{{ asset("/assets/business_landing/js/main.js") }}"></script>
    <script src="{{ asset("/node_modules/bootstrap/dist/js/bootstrap.min.js") }}"></script>

</body>
</html>
