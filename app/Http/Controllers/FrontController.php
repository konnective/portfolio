<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Note;
use App\Models\Project;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class FrontController extends Controller
{
    //  how many inputs: - days , goal name, 
    // now date 
    public  function index()
    {
        return view('front.profile');
    }
    public  function home()
    {
        $projects = Project::all();
        return view('front.home',compact('projects'));
    }
    public  function note($id)
    {
        $note = Note::find($id);
        return view('front.note',compact('note'));
    }
    public  function project_data($id)
    {
        // hve ajax call mate nu logic set karo 
        // also jquery ni cdn muko
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
        return view('front.profile');
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
                'end_date' => $request->end_date
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

        return redirect('/')->with('success', 'Form submitted successfully!');
    }

}
