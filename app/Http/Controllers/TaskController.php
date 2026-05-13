<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Upload;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::where('user_id', auth()->id())

            ->when($request->search, function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%');
            })

            ->when($request->status, function ($query) use ($request) {
                $query->where('status', $request->status);
            })

            ->latest()
            ->get();
        $uploads = Upload::where('user_id', auth()->id())
            ->latest()
            ->get();


        return view('tasks.index', compact('tasks', 'uploads'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'required',
            'due_date' => 'nullable|date',
        ]);

        $task = new Task();
        $task->user_id = auth()->id();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task created successfully');
    }

    public function edit(Task $task)
    {
        if ($task->user_id != auth()->id()) {

            return redirect()
                ->route('tasks.index')
                ->with('error', 'Unauthorized access');
        }

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        if ($task->user_id != auth()->id()) {

            return redirect()
                ->route('tasks.index')
                ->with('error', 'Unauthorized access');
        }

        $request->validate([
            'title' => 'required|max:255',
            'status' => 'required',
            'due_date' => 'nullable|date',
        ]);

        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        if ($task->user_id != auth()->id()) {

            return redirect()
                ->route('tasks.index')
                ->with('error', 'Unauthorized access');
        }

        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task deleted successfully');
    }
    public function show(Task $task)
    {
        if ($task->user_id != auth()->id()) {

            return redirect()
                ->route('tasks.index')
                ->with('error', 'Unauthorized access');
        }

        return view('tasks.show', compact('task'));
    }
}