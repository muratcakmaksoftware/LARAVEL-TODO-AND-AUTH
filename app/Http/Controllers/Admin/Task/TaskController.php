<?php

namespace App\Http\Controllers\Admin\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index(Request $request)
    {

        $user = Auth::user();
        $tasks = Task::query();
        if($request->has("title")){
            $tasks = $tasks->where("title", "LIKE", "%".$request->get("title")."%");
        }

        if($request->has("description")){
            $tasks = $tasks->where("description", "LIKE", "%".$request->get("description")."%");
        }

        if($request->has("status")){
            $status = $request->get("status");
            if($status != -1){ //hepsi seçilmemiş ise status filtresi
                $tasks = $tasks->where("status", $status);
            }

        }

        if($request->has("user_id")){ //yetkilide görünen input ancak inject olabilir diye kontrol genişletildi.
            if($user->role == 1){//Admin ise kullanıcıya göre görüntüleme yetkisine sahip.
                $user_id = $request->get("user_id"); // Yetkili ise kişiye özgü filtreleme veya hepsini görme.
                if($user_id == -1){ // tüm tasklar
                    $tasks = $tasks->paginate(10);
                }else{ //kişiye göre filtreleme
                    $tasks = $tasks->where("user_id", $user_id)->paginate(10);
                }
            }else{ //üye ise sadece kendisini görebilir.
                $tasks = $tasks->where("user_id", $user->id)->paginate(10);
            }
        }else{ // Yetkili biri değil veya varsayılan giriş.
            $tasks = $tasks->where("user_id", $user->id)->paginate(10);
        }

        $users = User::get();

        return view('admin.task.index')->with("tasks", $tasks)->with("users", $users);
    }

    public function getAdd()
    {
        return view('admin.task.add');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $task = new Task;
        $task->user_id = Auth::user()->id;
        $task->title = $request->input("title");
        $task->description = $request->input("description");
        $task->save();

        return redirect()->route('admin.task');
    }

    public function getEdit($id)
    {
        $task = Task::where("id", $id)->first();
        if(isset($task)){
            return view('admin.task.edit')->with("task", $task);
        }else{
            return redirect()->back();
        }
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $task = Task::where("id", $id)->first();
        if(isset($task)){
            $task->title = $request->input("title");
            $task->description = $request->input("description");
            $task->status = $request->input("status");
            $task->save();
        }else{
            return redirect()->back();
        }

        return redirect()->route('admin.task');
    }

    public function delete(Request $request)
    {
        $task = Task::where("id", $request->get("id"))->first();
        if(isset($task)){
            $task->delete();
            return response()->json(['status' => 1, 'message' => "Task Deleted"]);
        }else{
            return response()->json(['status' => 0, 'message' => "ID NOT FOUND"]);
        }
    }

}
