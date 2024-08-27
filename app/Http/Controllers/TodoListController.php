<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Create todo
    public function store(Request $request)
    {
        $todo = TodoList::create($request->all());
        return response()->json($todo, 201);
    }

    // Read all
    public function index()
    {
        return response()->json(TodoList::all(), 200);
    }

    // Read todo
    public function show($id)
    {
        $todo = TodoList::find($id);
        if ($todo) {
            return response()->json($todo, 200);
        } else {
            return response()->json(['message' => 'Todo not found'], 404);
        }
    }

    // Update a todo
    public function update(Request $request, $id)
    {
        $todo = TodoList::find($id);
        if ($todo) {
            $todo->update($request->all());
            return response()->json($todo, 200);
        } else {
            return response()->json(['message' => 'Todo not found'], 404);
        }
    }

    // Delete a todo
    public function destroy($id)
    {
        $todo = TodoList::find($id);
        if ($todo) {
            $todo->delete();
            return response()->json(['message' => 'Todo deleted'], 200);
        } else {
            return response()->json(['message' => 'Todo not found'], 404);
        }
    }
}
