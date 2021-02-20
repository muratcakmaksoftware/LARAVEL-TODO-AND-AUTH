<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $all_task_count = Task::count();
        $task_count = Task::where("user_id", $user->id)->count();
        return view('admin.home')
            ->with("task_count", $task_count)
            ->with("all_task_count", $all_task_count);
    }

}
