<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@if (trim($__env->yieldContent('title'))) @yield('title') - Beyond Plus CMS @endif Beyond Plus CMS </title>
    
    <link rel="stylesheet" type="text/css" href="{{ asset("/node_modules/bootstrap/dist/css/bootstrap.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("/assets/larmaysee/css/main.css") }}">

    <link rel="stylesheet" href="{{ asset('/assets/larmaysee/css/larmaysee.css') }}">
    
    <!-- JavaScripts -->
    <script src="{{ asset("/node_modules/jquery/dist/jquery.min.js") }}"></script>

    <!-- bxSlider Javascript file -->
    <script src="{{ asset("/node_modules/bxslider/dist/jquery.bxslider.min.js") }}"></script>
    <!-- bxSlider CSS file -->
    <link href="{{ asset("/node_modules/bxslider/dist/jquery.bxslider.min.css") }}" rel="stylesheet" />

    <style >
    //div {border:1px solid blue;} </style>
</head>
<body>

    <!-- Header -->

    @include('theme.larmaysee.layouts.header')

    <!-- Sidebar -->
   <!-- @1include('layouts/larmaysee/slider')  -->

    @yield('content')

    <!-- Footer -->
    @include('theme.larmaysee.layouts.footer')


<!-- REQUIRED JS SCRIPTS -->

        
    <script src="{{ asset("/assets/larmaysee/js/main.js") }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
          $('.bxslider').bxSlider({
            'auto' :true,
            'speed' : 500,
          });
        });
    </script>
</body>
</html>
