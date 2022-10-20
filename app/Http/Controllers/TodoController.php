<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Tag;
use App\Http\Requests\TodoRequest;



class TodoController extends Controller
{
    public function index()
    {
        $todo = Todo::all();        
        $user = Auth::user();
        $tag = Tag::all();
        $param = ['todos' => $todo, 'user' =>$user, 'tags'=>$tag];
        return view('index', $param);

    }


    
    public function add()
    {
        return view('add');
    }
    public function create(TodoRequest $request)
    {
        $form = $request->all();
        Todo::create($form);
        return redirect('/');
    }


    public function edit(Request $request)
    {
        $todo = Todo::find($request->id);
        return view('edit', ['form' => $todo]);
    }
    public function update(TodoRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todo::where('id', $request->id)->update($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $todo = Todo::find($request->id);
        return view('delete', ['form' => $todo]);
    }
    public function remove(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/');
    }

    public function find()
    {
        return view('find', ['input' => '']);
    }
    public function search(Request $request)
    {       
        $todo = Todo::find($request->input);
        $user = Auth::user();
        $tags = Tag::all();
        $param = ['todo' => $todo, 'user' =>$user, 'tags'=>$tags,'input' => $request->input];
        return view('search', $param);

        
        
    }

    public function relate(Request $request)
    {
        $tags = Tag::all();
        return view('tag.index', ['tags' => $tags]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }



}