<?php

namespace App\Http\Controllers;

use App\Models\UsersDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class usersDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = UsersDataTable::paginate(5);
        return view("usersIndex", ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data = UsersDataTable::all();
        return view("createUsers");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20|min:3',
            'email' => 'required|email|unique:users_data_table,email',
            'password' => 'required|string|min:8',
        ], [
            'name.required' => 'Name is required',
            'name.max' => 'Maximum must be 20 character',
            'name.min' => 'Minimum should be 3 character',
            'email.required' => 'Email is required',
            'email.unique' => 'Email is already Exist',
            'password.required' => 'Password is required',
            'password.min' => 'minimum 8 character is required',

        ]);
        $user = new UsersDataTable([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        $user->save();
        return redirect()->route('usersIndex')->with('sucess', "user created sucessfully");
    }

    /* Show the form for editing the specified resource. */
    public function edit(string $id)
    {
        $user = UsersDataTable::findOrFail($id);
        return view("editusers", compact('user'));
    }

    /* Update the specified resource in storage.*/
    public function update(Request $request, string $id)
    {
        $validatedData =  $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|email|unique:users_data_table,email,' . $id . ',id',
        ], [
            'name.required' => 'Name is required',
            'name.max' => 'Maximum must be 20 character',
            'email.required' => 'Email is required',
            'email.unique' => 'Email is already Exist',
        ]);
        $user = UsersDataTable::where('id', $id);
        $user->update($validatedData);
        return redirect()->route('usersIndex')->with('sucess', "updated sucessfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = UsersDataTable::findOrFail($id);
        $user->delete();
        return redirect()->route('usersIndex')->with('deleted', "Deleted sucessfully");
    }
}
