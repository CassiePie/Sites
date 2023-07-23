<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TodoController extends Controller
{
    public function index() {
        $todos = Todo::uncompleted()->where('user_id', Auth::id())->get();
        $completedTodos = Todo::completed()->where('user_id', Auth::id())->get();

        return view('todos.index', [
            'todos' => $todos,
            'completedTodos' => $completedTodos
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'content' => 'required'
        ]);

        $todo = new Todo();
        $todo->content = $request->content;
        $todo->user_id = Auth::id();
        $todo->save();

        return redirect()->back();
    }

    public function toggle(Todo $todo) {
        if (!Gate::allows('update-todos', $todo)) {
            abort(403);
        }
        $todo->completed = !$todo->completed;
        $todo->save();

        return redirect()->back();
    }

    public function destroy(Todo $todo) {
        $todo->delete();
        return redirect()->back();
    }
}
