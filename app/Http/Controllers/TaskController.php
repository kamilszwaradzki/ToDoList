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
    public function store(Request $request)
    {

        $array = $request->get('table');

    
        foreach($array as $ar)
        {
            DB::table('tasks')->updateOrInsert(
                [
                    'id' => $ar['id'],
                ],
                [
                    'content' => $ar['content'],
                    'status' => $ar['status'] === "true" ? 1: $ar['status'] === '1'? 1 : 0
                ]
            );
        }
        
    return view('home');

    }
}
