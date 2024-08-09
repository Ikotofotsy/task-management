<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function tasks(): View | RedirectResponse{
        return view('Tasks.index',[
            'user' => Auth::user()
        ]);
    }

    public function form(): View | RedirectResponse {
        return view('Tasks.form',[
            'user' => Auth::user(),
            'task' => new Task()
        ]);
    }

    public function store(TaskRequest $request): View | RedirectResponse {
        try{
            $task = $request->validated();
            $task['user_id'] = Auth::id();
            $task = Task::create($task);

            return to_route('tasks')
            ->with([
                'success' => 'La tache '.$task->title.' a ete bien cree',
                'user' => Auth::user()
            ]);
        } catch(Exception $e){
            return back()->withErrors([
                'errors' => $e->getMessage()
            ]);
        }
    }

    public function update(Task $task): View | RedirectResponse{
        return view('Tasks.form',[
            'user' => Auth::user(),
            'task' => $task
        ]);
    }

    public function save(TaskRequest $request, Task $task): View | RedirectResponse {
        try{
            $task->update($request->validated());

            return to_route('tasks')
            ->with([
                'success' => 'La tache '.$task->title.' a ete bien modifie',
                'user' => Auth::user()
            ]);
        } catch(Exception $e){
            return back()->withErrors([
                'errors' => $e->getMessage()
            ]);
        }
    }

    public function delete(Task $task): View | RedirectResponse {
        try{
            $task->delete();

            return to_route('tasks')
            ->with([
                'success' => 'La tache '.$task->title.' a ete bien supprimer',
                'user' => Auth::user()
            ]);
        } catch(Exception $e){
            return back()->withErrors([
                'errors' => $e->getMessage()
            ]);
        }
    }
    
}
