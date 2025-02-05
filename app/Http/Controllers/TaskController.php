<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //making view ,fun for add task
    // then add users on main page
    // 
    public function addTask()
    {
        $users = User::partner();
       return view('front.add-task',compact('users'));

    }

    public function viewTask($id)
    {
        $users = User::with('tasks')->find($id);
        $res= [
            "success"=>true,
            "users"=>$users
        ];
        return response()->json($res);

    }
    public function create(Request $req)
    {
        if($req->task_ids){
            foreach($req->task_ids as $item){
                $task = Task::find($item);
                $task->status = 1;
                $task->save();
            }

        }else{
            $task  = new Task;
            $task->name = $req->name;
            $task->user_id = $req->user_id;
            $task->save();
        }

        return redirect()->back();

    }
}
