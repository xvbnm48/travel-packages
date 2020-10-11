<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @stack('prepend-style')
    @include('includes.style')
    @stack('addons-style')

</head>
<body>

    <!-- navbar -->
    @include('includes.navbar-alternate')
    @yield('content')

    @stack('prepend-script')
    @include('includes.script')
    @stack('addons-script')
</body>
</html>
