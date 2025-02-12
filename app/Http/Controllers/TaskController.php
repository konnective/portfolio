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
        // changing the tasks to 
        if(request()->query()['project_id']){
            $tasks = Task::where('user_id',$id)->where('project_id',request()->query()['project_id'])->get();
            // $users = User::with('tasks')->where('project_id',$)->first();
        }else{
            $tasks = Task::where('user_id',$id)->get();
        }
        $res= [
            "success"=>true,
            "tasks"=>$tasks
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
            $task->project_id = $req->project_id ? $req->project_id:'';
            $task->details = $req->details ? $req->details:'';
            $task->save();
        }

        return redirect()->back();

    }
    public  function taskData($id)
    {
        $user = User::with('tasks')->find($id);
        $html = '';
        
        if($user){
            foreach($user->tasks as $item){
                $div = '<div class="marker" title="Not completed"></div>';
                $divMarked = '<div class="marked" title="'.$item->updated_at.'"></div>';
                if($item->status == 1){
                    $html.=$divMarked;
                }else{
                    $html.=$div;
                    
                }
            }
        }
        $res= [
            "success"=>true,
            "html"=>$html
        ];
        return response()->json($res);
    }
}
