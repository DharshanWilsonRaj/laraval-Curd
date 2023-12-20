<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laraval Crud</title>
    @vite('resources/css/app.css')
</head>

<body class="font-sans">
    <div class="flex h-screen ">
        <div class="w-1/6 p-2 bg-indigo-600 text-white">
            <ul class="mt-6 w-full">
                <a href={{route('usersCreate')}}>
                    <li class="mt-3 text-xl bg-indigo-800 rounded p-2 hover:bg-indigo-900">Create Users</li>
                </a>
        </div>
        <div class="w-full">
            @yield('content')
        </div>
    </div>

</body>

</html>
