<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>

<body>

    <div class="flex justify-center flex-col w-1/2 mx-auto items-center mt-8">
        <h6 class="text-xl font-bold">Register</h6>
        <form method="POST" class="flex flex-col" action="{{ url('/register') }}">
            @csrf

            <div class="my-2 flex flex-col">
                <label for="name">Name:</label>
                <input type="name" name="name"
                    class="p-1 focus:outline-none focus:ring focus:border-blue-500  border border-slate-400 rounded"
                    value="{{ old('name') }}" required>
            </div>

            <div class="my-2 flex flex-col">
                <label for="email">Email:</label>
                <input type="email" name="email"
                    class="p-1 focus:outline-none focus:ring focus:border-blue-500  border border-slate-400 rounded"
                    value="{{ old('email') }}" required>
            </div>

            <div class="my-2 flex flex-col">
                <label for="password">Password:</label>
                <input type="password" name="password"
                    class="p-1 focus:outline-none focus:ring focus:border-blue-500  border border-slate-400 rounded"
                    value="{{ old('password') }}"required>
            </div>
            <button type="submit"
                class="bg-indigo-500 text-white py-1 mt-2 rounded font-bold hover:bg-indigo-600">Register</button>
            <a href="{{ route('login') }}" class="text-indigo-500 mt-1 text-sm text-end w-full">click here already have
                account?</a>
        </form>
    </div>


</body>

</html>
