<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('frontend.layouts.meta')
    @include('frontend.layouts.head')
    @yield('head')
    <title>@yield('title',config('app.name'))</title>
</head>
<body id="body">
@yield('header')
@yield('content')

@include('frontend.layouts.footer')
@include('frontend.layouts.scripts')
@include('frontend.layouts.shipping_modal')
@yield('scripts')
@stack('scripts')
</body>
</html>
