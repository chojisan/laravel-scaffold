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
  <link href="{{ asset('vendor/nucleo/css/nucleo.css') }}" rel="stylesheet" />
  <link href="{{ asset('vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Custom/Override CSS -->
  @stack('css')
</head>

<body class="bg-default">
    <div id="app">
        <!-- Sidenav -->
        @if (\Request::is('backend/*'))
            @include('partials.sidenav')
        @endif

        <!-- Main content -->
        @yield('content')

        <!-- Footer -->
        @if (\Request::is('backend/*'))
            @include('partials.footer')
        @endif
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Custom/Override Scripts -->
    @stack('js')
</body>

</html>
