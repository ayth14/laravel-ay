<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 12 Task List | @yield('page-title')</title>
    <script src="https://kit.fontawesome.com/e04637118f.js" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- Tailwind-Cdn ONLY FOR DEVELOPMENT --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}

    @vite('resources/css/app.css')
    @yield('styles')

</head>

<body class="container mx-auto mt-7 px-5">
    <h1 class="text-3xl font-bold">@yield('title')</h1>

    <div x-data="{ flash: true }">
        @if (session()->has('success'))
            {{-- alpine js container for enabling the  interaction for the content --}}
            <div x-show="flash"
                class="relative rounded border border-green-400 bg-green-200 px-4 py-3 text-lg text-green-700 max-w-lg my-5"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <div class="">{{ session('success') }}</div>
                <button class="absolute right-4 top-2 cursor-pointer" @click="flash=false">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endif


        <main>
            @yield('main-content')
        </main>
    </div>
</body>

</html>
