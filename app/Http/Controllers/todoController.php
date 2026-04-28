<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class todoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = \App\Models\Todo::all();
       return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'todo' => 'required|string|max:255',
        ]);

        \App\Models\todo::create([
            'todo' => $request->todo,
            'status' => 'Nonaktif',
        ]);

        return redirect()->route('todos.index')->with('success', 'Todo berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = \App\Models\todo::findOrFail($id);
        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todo = \App\Models\todo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'todo' => 'required|string|max:255',
            'status' => 'required|in:Aktif,Nonaktif,Selesai',
        ]);

        $todo = \App\Models\todo::findOrFail($id);
        $todo->update([
            'todo' => $request->todo,
            'status' => $request->status,
        ]);

        return redirect()->route('todos.index')->with('success', 'Todo berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = \App\Models\todo::findOrFail($id);
        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todo berhasil dihapus!');
    }
}
