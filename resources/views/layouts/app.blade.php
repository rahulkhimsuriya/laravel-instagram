<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" sizes="192x192" href="{{ asset('/favicon.png') }}">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'Instagram')</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/argon-design-system.css') }}" rel="stylesheet">

  <!-- Icons -->
  <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

  <!-- Custom Style -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body @guest class="bg-gradient-lighter" @else class="bg-secondary" @endguest>
<div id="app">

  @auth()
    <x-navbar></x-navbar>
  @endauth

  <main class="pt-7">
    @include ('_alert')
    <div class="container">
      @yield('content')
    </div>
  </main>
</div>

</body>
</html>
