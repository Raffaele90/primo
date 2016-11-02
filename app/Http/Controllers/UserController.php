<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected function index()
    {
        $users = DB::table('sys_config')->get();
        return $users;
    }
}

?>
