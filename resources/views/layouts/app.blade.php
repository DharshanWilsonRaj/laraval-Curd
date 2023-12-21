<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laraval Crud</title>
    @vite('resources/css/app.css')
    {{-- font awsome icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body class="font-sans">
    <div class="flex h-screen ">
        <div class="w-1/6 p-2 bg-indigo-600 text-white">

            @if (auth()->check())
                <div class="flex gap-2 items-center">
                    <i class="fa-solid fa-user"></i>
                    <p class="font-bold capitalize text-start text-xl">{{ auth()->user()->name }}</p>
                </div>
            @else
                <p>Guest User</p>
            @endif

            <ul class="mt-6 w-full">
                <a href={{ route('usersCreate') }}>
                    <li class="mt-3 text-sl bg-indigo-800 rounded p-2 hover:bg-indigo-900"> <i
                            class="fa-solid fa-user-plus"></i> Create Users</li>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="mt-3 text-sl bg-indigo-800 rounded p-2 flex items-center w-full hover:bg-indigo-900">
                        <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                    </button>
                </form>
        </div>
        <div class="w-full">
            @yield('content')
        </div>
    </div>

</body>

</html>
