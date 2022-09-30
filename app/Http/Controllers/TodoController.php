<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;



class TestController extends Controller
{
    public function index()
    {
        $authors = Todo::all();
        return view('index', ['todos' => $todos]);;
    }
}