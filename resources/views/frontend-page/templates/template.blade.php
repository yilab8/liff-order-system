<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('frontend-page.partials.head')
</head>
<body>
    @include('frontend-page.partials.header')
    @yield('content')
    @include('frontend-page.partials.footer')
</body>
</html>