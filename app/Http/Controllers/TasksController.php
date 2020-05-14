<?php

namespace App\Http\Controllers;

use App\DataProviders\TaskDataProvider;
use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(TaskDataProvider $provider)
    {
        $tasks = $provider->getTaskList();
        return view('tasks.index', compact('tasks'));
    }

    public function add()
    {
        return view('tasks.add');
    }

    public function store(Request $request, TaskDataProvider $provider)
    {
        $provider->addNewTask($request->all());

        return redirect('/tasks');
    }

    public function download(Task $task, TaskDataProvider $provider)
    {
        $provider->downloadTask($task);
    }
}
