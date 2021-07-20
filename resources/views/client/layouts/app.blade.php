<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Arlink')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <x-laravel-blade-sortable::scripts/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}
{{--    <link rel=stylesheet href=https://pro.fontawesome.com/releases/v5.10.0/css/all.css>--}}

    <!-- Styles -->
    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/taplink.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
</head>
<body class="bg-dark">
<div id="app">
    {{--        @include('client.layouts.header')--}}
    <x-sidebar/>
    <main class="py-4">
        @yield('content')

    </main>
    <x-footer/>
</div>
@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10">
</script>
<x-livewire-alert::scripts />
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>


<script src="{{asset('livewire-sortable/src/index.js')}}" defer></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
</body>
</html>
