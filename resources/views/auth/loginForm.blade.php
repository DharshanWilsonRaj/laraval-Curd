<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<script>
    const handleclear = () => {
        let ele = document.getElementById('danger_block');
        ele.remove();
    }
</script>

<body>
    @if ($errors->has('email'))
        <div class="bg-red-500 w-1/2 mx-auto my-5 rounded p-2 px-3 text-white flex justify-between" id="danger_block">
            {{ $errors->first('email') }}
            <span class="cursor-pointer text-xl" onclick="handleclear()">x</span>
        </div>
    @endif

    <div class="flex  flex-col w-1/2 mx-auto items-center mt-8">
        <h6 class="text-xl font-bold">Login</h6>
        <form method="POST" class="flex flex-col" action="{{ url('/login') }}">
            @csrf

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
                class="bg-indigo-500 text-white py-1 mt-2 rounded font-bold hover:bg-indigo-600">Login</button>
            <a href="{{ route('register') }}" class="text-indigo-500 mt-1 text-sm text-end w-full">Create an new
                account</a>
        </form>


        <div id="user-list"></div>
    </div>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Call the API when the page is loaded
            fetch('/api/usersIndex')
                .then(response => response.json())
                .then(data => {
                    let userList = document.getElementById('user-list');
                    userList.innerHTML = renderUserList(data.data.data);
                })
                .catch(error => console.error('Error:', error));
        });

        // Function to render the user list
        function renderUserList(users) {
            return `<ul>${users.map(user => `<li>${user.name} - ${user.email}</li>`).join('')}</ul>`;
        }
    </script> --}}
</body>

</html>
