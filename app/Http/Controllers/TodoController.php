<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    //
    public function index() {
      $todos = Todo::latest()->get();
      //$todos = [];
      return view('todo.index',['todos' => $todos
    ]);
    }
    public function show(Todo $todo) {
      // $todo = Todo::findOrFail($id);

      return view('todo.show')->with('todo',$todo);
    }

    public function create() {
      return view('todo.create');
    }

    public function store(TodoRequest $request) {
      $todo = new Todo();
      $todo->title = $request->title;
      $todo->body = $request->body;
      $todo->save();
      return redirect('/');
    }

    public function edit(Todo $todo) {
      return view('todo.edit')->with('todo',$todo)  ;
    }

    public function update(TodoRequest $request,Todo $todo) {
      $todo->title = $request->title;
      $todo->body = $request->body;
      $todo->save();
      return redirect('/');
    }
    public function destroy(Todo $todo) {
      $todo->delete();
      return redirect('/');
    }
}
