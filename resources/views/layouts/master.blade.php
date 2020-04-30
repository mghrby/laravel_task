<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>

<!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />

    <!-- Custom styles for this template -->
    <link href="{{asset('css/shop-homepage.css')}}" rel="stylesheet">

    <!-- DevExtreme themes -->
    <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/19.2.7/css/dx.common.css">
    <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/19.2.7/css/dx.light.css">
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{!Request::segment(1) ? "active" : ""}}">
                    <a class="nav-link" class="{" href="{{url('/')}}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item {{Request::is('category/create') ? "active" : ""}}">
                    <a class="nav-link" href="{{url('category/create')}}">Add Category</a>
                </li>
                <li class="nav-item {{Request::is('product/create') ? "active" : ""}}">
                    <a class="nav-link" href="{{url('product/create')}}">Add Product</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Page Content -->
<div class="container" style="min-height: 100% !important;">

@yield('content')

</div>
<!-- /.container -->
<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/fontawesome.min.js"></script>
<!-- DevExtreme library -->
<script type="text/javascript" src="https://cdn3.devexpress.com/jslib/19.2.7/js/dx.all.js"></script>
<script src="{{asset('vendor/dataGrid.js')}}"></script>
<script src="{{asset('vendor/dx.aspnet.data.js')}}"></script>
<script>
    $(function () {
        $('#myFormSubmit').click(function(e){
            e.preventDefault();
            alert($('#myField').val());
            /*
            $.post('http://path/to/post',
               $('#myForm').serialize(),
               function(data, status, xhr){
                 // do something here with response;
               });
            */
        });
    })
</script>
</body>
</html>
