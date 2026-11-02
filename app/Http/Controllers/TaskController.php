<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $tasks = auth()->user()
            ->tasks()
            ->latest()
            ->get();

            // SELECT * FROM `tasks` WHERE `tasks`.`user_id` = 1 ORDER BY `created_at` DESC;

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
          'title'=>'required|string|max:255',
          'description'=>'nullable|string',
          'priority'=>'required|in:low,medium,high',
          'due_date'=>'nullable|date',
        ]);
        auth()->user()->tasks()->create($validate);

         return redirect()
            ->route('tasks.index')
            ->with('success', 'Task created successfully!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
         $task = auth()->user()
            ->tasks()
            ->findOrFail($task->id);

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task = auth()->user()
            ->tasks()
            ->findOrFail($task->id);

       $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
            'due_date' => 'nullable|date',
            'status' => 'required|in:pending,completed',
        ]);

          $task->update($validate);
           return redirect()
            ->route('tasks.index')
            ->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        
        $task = auth()->user()
            ->tasks()
            ->findOrFail($task->id);

        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task deleted successfully!');
    }
}
