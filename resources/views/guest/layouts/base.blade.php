<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/scss/app.scss')
</head>
<body>
    @include('guest.includes.header')
    <div class="container">
        <main>
            @yield('contents')
        </main>
    </div>
    @include('guest.includes.footer')
</body>
</html>