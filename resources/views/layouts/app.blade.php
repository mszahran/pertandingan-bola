<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
{{--    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>--}}
    <!-- Bootstrap Bundle JS (Bootstrap JS + Popper.js) -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Klasemen Sepak Bola</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{--        <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
        {{--            <ul class="navbar-nav me-auto mb-2 mb-lg-0">--}}
        {{--                <li class="nav-item">--}}
        {{--                    <a class="nav-link active" aria-current="page" href="#">Home</a>--}}
        {{--                </li>--}}
        {{--                <li class="nav-item">--}}
        {{--                    <a class="nav-link" href="#">Link</a>--}}
        {{--                </li>--}}
        {{--            </ul>--}}
        {{--        </div>--}}
    </div>
</nav>

<div class="container-fluid mt-4">
    @yield('content')
</div>

</body>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
</html>
