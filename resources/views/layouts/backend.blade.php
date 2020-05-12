<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Favicon -->
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->

  <!-- Icons -->
  <link href="./vendor/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="./vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Custom/Override CSS -->
  @stack('css')
</head>

<body class="">
    <div id="app">
        <!-- Sidenav -->
        @include('partials.sidenav')

        <!-- Main content -->
        <div class="main-content" id="panel">
            <!-- Topnav -->
            @include('partials.topnav')

            <!-- Header -->
            @include('partials.header')

            <!-- Page content -->
            <div class="container-fluid mt--6">
                @yield('content')
            </div>
        </div>

        <!-- Footer -->
        @include('partials.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Custom/Override Scripts -->
    @stack('js')
</body>

</html>