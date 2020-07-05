<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        return DB::table('tasks')->paginate();
    }
    //
    public function create()
    {
        return view('home');
    }
}
