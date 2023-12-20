@extends('layouts.app')

@section('content')
    <div class="p-2">
        <a href="/" class=" bg-indigo-600 p-2 px-4 rounded text-white hover:bg-indigo-500">
            Back
        </a>

        <div class="flex min-h-full flex-col justify-center px-6 py-1 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                {{-- <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                    alt="Your Company"> --}}
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Update User
                </h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="{{ route('usersUpdate', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name
                        </label>
                        <div class="mt-2">
                            <input id="name" name="name" type="name" value="{{ $user->name }}"
                                autocomplete="name"
                                class="block px-2 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-red-200 sm:text-sm sm:leading-6">
                            @error('name')
                                <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                            address</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email"
                                value="{{ $user->email }}"
                                class="block px-2 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-red-200 sm:text-sm sm:leading-6 ">
                            @error('email')
                                <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
