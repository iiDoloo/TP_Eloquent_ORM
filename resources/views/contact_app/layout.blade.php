<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>ContactAPP @yield('title')</title>
</head>
<body>
    @include('contact_app.navbar')
    <div class="container mx-auto mt-4">
        @yield('content')
    </div>
</body>
</html>