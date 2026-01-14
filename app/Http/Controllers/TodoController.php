<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        // Get todos from session
        $todos = session()->get('todos', []);

        return view('todos', [
            'todos' => $todos
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:255',
        ]);

        // Get existing todos
        $todos = session()->get('todos', []);

        // Add new todo
        $todos[] = $request->task;

        // Save back to session
        session()->put('todos', $todos);

        return redirect()->route('todos.index');
    }

    public function delete($index)
    {
        $todos = session()->get('todos', []);

        if (isset($todos[$index])) {
            unset($todos[$index]);
            session()->put('todos', array_values($todos));
        }

        return redirect()->route('todos.index');
    }

    public function clearSession()
    {
        // Clear all session data
        session()->flush();

        // Redirect back to the main page (refresh)
        return redirect()->route('todos.index');
    }

}
