<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Note;
use App\Models\Product;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class FrontController extends Controller
{
    //new objectives for this task manager 
    // setting up export website for 
    public  function developer()
    {
        return view('front.developer');
    }
    public  function insure()
    {
        return view('front.insure');
    }
    public  function blogger()
    {
        return view('front.blogger');
    }
    public  function notes()
    {
        return view('front.notes');
    }
    public  function singleNote()
    {
        return view('front.single-note');
    }
    public  function home()
    {
        $products = Product::individual();
        $projects = Project::where('user_id',Auth::user()->id)->get()->map(function($project){
            $days = Day::where('project_id',$project->id)->where('is_done',0)->get();
            $project->day_count = count($days);
            return $project;
        });
        return view('front.home',compact('projects','products'));
    }
    public  function note($id)
    {
        $note = Note::find($id);
        return view('front.note',compact('note'));
    }
    public  function project_data($id)
    {

        $project = Project::with('days')->find($id);
        $html = '';
        $div = '<div class="marker"></div>';
        $divMarked = '<div class="marked"></div>';
        if($project){
            foreach($project->days as $item){
                if($item->is_done == 1){
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

    public  function profile()
    {
        return view('front.export');
    }


    public function changeProgress($id)
    {
        $project = Project::find($id);
        if ($project) {
            $day = Day::where('project_id',$project->id)->where('is_done',0)->first();
            $day->is_done = 1;
            $day->save();
        }
       $res=[
            "success"=>true,
            "message"=>"Added progress"
       ];
       return response()->json($res);

    }
    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'days' => 'required|integer|min:1'
        ]);

        try {
            //code...
            $project = Project::create([
                'name' => $request->name,
                'end_date' => $request->end_date,
                'user_id' => Auth::user()->id
            ]);
            for ($i = 1; $i <= $request->input('days'); $i++) {
                Day::create([
                    'project_id' => $project->id,
                ]);
            }
        } catch (\Throwable $th) {
            dd($th);
        }

      
        // Handle the data (save to database, etc.)

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect('products')->with('success', 'Form submitted successfully!');
    }

    public function projectDelete($id) {
        try {
            //code...
            $project = Project::find($id);
            DB::transaction(function () use ($project) {
                $project->days()->delete();
                $project->delete();
            });
        } catch (\Throwable $th) {
            dd($th);
        }
    }

   

}
