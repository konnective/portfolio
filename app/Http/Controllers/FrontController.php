<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Project;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //tasks
    //making model =
    //designing page 
    //routing notes to details page
    //deciding fields =
    // 
    public  function index()
    {
        return view('front.index');
    }
    public  function home()
    {
        $projects = Note::all();
        return view('front.home',compact('projects'));
    }
    public  function note($id)
    {
        $note = Note::find($id);
        return view('front.note',compact('note'));
    }
}
