<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Taskcategory;
use Illuminate\Http\Request;

class TaskController extends Controller

{
    public function index()
    {
        $task = new Task();
        $task = $task->get();
        return view('dashbord.dashbord', [
            'task' => $task
        ]);
    }



    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $statuses = [
            [
                'label' => 'Todo',
                'value' => 'Todo',
            ],
            [
                'label' => 'Done',
                'value' => 'Done',
            ]
        ];
        return view('edit', compact('statuses', 'task'));
    }

    public function create()
    {
        $categories = Taskcategory::all();
        $statuses = [
            [
                'label' => 'Todo',
                'value' => 'Todo',
            ],
            [
                'label' => 'Done',
                'value' => 'Done',
            ]
        ];
        return view('Admin.add_task', compact('statuses','categories'));

        // return view('task.create');

    }


    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required'
        ]);

        $task = new Task();
        $task->task = $request->task;
        $task->description = $request->description;
        $task->status = $request->status;
        //$task->category_id = $request->input('category_id');
        $task->category_id = $request->category_id;
        $task->save();
        return redirect()->route('add.task');
    }



    public function update($id, Request $request)
    {

        $task =  Task::findOrFail($id);
        $request->validate([
            'task' => 'required'
        ]);

        $task->task = $request->task;
        $task->description = $request->description;
        //$task->category_id = $request->input('category_id');
        $task->category_id = $request->category_id;
        $task->status = $request->status;
        $task->save();
        //return redirect()->route('index');
        return view('task.edit', compact('tasks'));
    }


    public function tasksData()
    {
        $tasks = Task::with('taskcategory')->get();
        //$tasks = Task::all();
        return view('Admin.all_tasks', compact('tasks'));

    }

    public function delete($id)
    {
        $task =  Task::findOrFail($id);
        if ($task->delete()) {

            return redirect()->back()->with(['msg' => 1]);
        } else {
            return redirect()->back()->with(['msg' => 2]);
        }
    }
}
