<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'STAR EVAL')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    @yield('content')

    @livewireScripts
</body>
</html>
