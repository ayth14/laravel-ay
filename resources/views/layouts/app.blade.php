<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 12 Task List | @yield('page-title')</title>

    {{-- Tailwind-Cdn ONLY FOR DEVELOPMENT --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}

    @vite('resources/css/app.css')
    @yield('styles')

</head>

<body class="container mx-auto mt-7 px-5">
    @if (session()->has('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    <h1 class="text-3xl font-bold">@yield('title')</h1>

    <main>
        @yield('main-content')
    </main>
</body>

</html>
