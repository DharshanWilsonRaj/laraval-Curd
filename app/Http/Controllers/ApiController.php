<?php

namespace App\Http\Controllers;

use App\Models\UsersDataTable;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $columns = ['id', 'name', 'email'];
        $data = UsersDataTable::select($columns)->paginate(5);
        return response()->json(['data' => $data], 200);
    }
}
