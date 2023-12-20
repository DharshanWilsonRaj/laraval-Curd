<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersDataTable extends Model
{
    use HasFactory;
    protected $table = 'users_data_table';
    protected $guarded = [];
}
