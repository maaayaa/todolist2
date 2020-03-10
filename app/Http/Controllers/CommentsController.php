<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Comment;

class CommentsController extends Controller
{
    //
    public function store(Request $request, Todo $todo) {
      $this->validate($request, [
        'body' => 'required'
      ]);
      $comment = new Comment(['body' => $request->body]);
      $todo->comments()->save($comment);
      return redirect()->action('TodoController@show', $todo);
    }
    public function destroy(Todo $todo, Comment $comment) {
      $comment->delete();
      return redirect()->back();
    }
}
