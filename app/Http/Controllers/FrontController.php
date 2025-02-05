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
        $projects = Project::where('user_id',Auth::user()->id)->get()->map(function($project){
            $days = Day::where('project_id',$project->id)->where('is_done',0)->get();
            $project->day_count = count($days);
            return $project;
        });
        return view('front.home',compact('projects'));
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

        return redirect('/')->with('success', 'Form submitted successfully!');
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

    public function products() 
    {

        $products = Product::all();
        $users  = User::partner();
        

        return view('front.products',compact('products','users'));
        
    }
    public function addProduct(Request $request) 
    {

        $product = new Product;
        $product->name = $request->name;
        $product->subject = $request->subject;
        $product->details = $request->details;
        $product->save();

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        // return redirect()->back();
        
    }
    public function deleteProduct($id) 
    {

        try {
            //code...
            $project = Product::find($id);
            DB::transaction(function () use ($project) {
        
                $project->delete();
            });
        } catch (\Throwable $th) {
            dd($th);
        }
        
    }
    public function product($id) 
    {

        $product = Product::find($id);
        return view('front.product-details',compact('product'));
        
    }

    public function register(Request $request)
    {
        return view('front.register');
    }
    public function registerAttempt(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // $token = $user->createToken('auth_token')->plainTextToken;

        return redirect('login');
    }

    public function login()
    {
        return view('front.login');

    }
    public function loginAttempt(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        return redirect('homee');

        // $token = $user->createToken('auth_token')->plainTextToken;

        // return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
    }

}
