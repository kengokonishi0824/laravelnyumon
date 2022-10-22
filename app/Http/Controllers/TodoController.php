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
        $user = Auth::user();
        $todo = Todo::where('user_id',$user->id)->get();        
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
        return redirect('home');
    }


    public function edit(Request $request)
    {
        $todo = Todo::find($request->id);
        $tag = Todo::find($request->tag_id);
        return view('edit', ['form' => $todo, $tag]);
    }
    public function update(TodoRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todo::where('id', $request->id,)->update($form);
        return redirect('home');
    }

    public function delete(Request $request)
    {
        $todo = Todo::find($request->id);
        return view('delete', ['form' => $todo]);
    }
    public function remove(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('home');
    }




    public function find()
    {
        return view('find', ['input' => '']);
    }
    public function search(Request $request)
    {       
        $user = Auth::user();
        $tags = Tag::all();
        if($request->tag_id==null){
            $todo = Todo::where('user_id', $user->id)
                    ->where('content', 'LIKE' ,"%".$request->input."%")
                    ->get();
        }else{
            $todo = Todo::where('user_id', $user->id)
                    ->where('content', 'LIKE' ,"%".$request->input."%")
                    ->where('tag_id', $request->tag_id)
                    ->get();
        };
        $param = ['todos' => $todo, 'user' =>$user, 'tags'=>$tags,'input' => $request->input];
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