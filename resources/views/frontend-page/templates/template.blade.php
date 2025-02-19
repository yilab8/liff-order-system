<!DOCTYPE html>
<html lang="zh_TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LIFF Order System')</title>
    @include('frontend-page.partials.head')
    <!-- 引入css -->
    @vite(['resources/css/app.css'])
    @yield('css')

    {{-- 引入liff --}}
    <script src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
</head>

<body>
    <!-- 引入header -->
    @include('frontend-page.partials.header')
    <!-- 引入content -->
    @yield('content')
    <!-- 引入footer -->
    @include('frontend-page.partials.footer')

    {{-- 通用js --}}
    @vite(['resources/js/liff.js'])

    <!-- 引入js -->
    @yield('script')

    @vite(['resources/js/app.js'])
</body>

</html>
