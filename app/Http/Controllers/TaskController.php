<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks = Task::orderBy('id','DESC')->get();
        return view('home', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        Task::create(["name" => $request->name]);
        return view('home', ['tasks' => Task::all()]);
    }

    public function toggle(Request $request)
    {
        $task = $request->validate([
            'name' => 'required'
        ]);
        Task::create($task);
        return view('home');
    }

    public function delete(Task $task)
    {
        $task->delete();
        return view('home', ['tasks' => Task::all()]);
    }
}
