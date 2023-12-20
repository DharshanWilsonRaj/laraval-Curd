@extends('layouts.app')

@section('content')
    <h6 class="text-2xl mt-1 mx-2 font-bold"> Laravel Crud </h6>
    <table class="table-fixed w-full mt-5 ">
        <thead>
            <tr class="bg-slate-200 p-3">
                <th class="text-left py-3 px-2">#</th>
                <th class="text-left py-3 px-2">Name</th>
                <th class="text-left py-3 px-2">Email</th>
                <th class="text-left py-3 px-2 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $key => $user)
                <tr class="border py-3 px-2">
                    <td class="py-3 px-2">{{ $key + 1 }}</td>
                    <td class="py-3 px-2">{{ $user->name }}</td>
                    <td class="py-3 px-2">{{ $user->email }}</td>
                    <td class="py-3 px-2 text-center">
                        <a href="{{ route('userEdit', ['id' => $user->id]) }}"
                            class="inline-flex items-center rounded-md bg-gray-50 px-3 py-2 mr-2 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10 hover:bg-gray-200">Edit
                        </a>
                        <a href="{{ route('deleteUser', ['id' => $user->id]) }}"
                            class="inline-flex items-center text-white rounded-md bg-red-500 px-3 py-2 mr-2 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10 hover:bg-red-600">Delete
                        </a>
                    </td>
                </tr>
            @empty
                <tr class="text-center  w-full h-72">
                    <td colspan="4" class="text-xl">No items </td>
                </tr>
            @endforelse
        </tbody>

    </table>
    {{ $data->links('layouts.custom-pagination') }}
@endsection
