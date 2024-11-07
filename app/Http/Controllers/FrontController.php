<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //tasks
    // making cards from second brain prev
    // taking project model 
    // rendering from foreach loop
    // implementing navbar
    public  function index()
    {
        return view('front.index');
    }
    public  function home()
    {
        $projects = Project::all();
        return view('front.home',compact('projects'));
    }
}
