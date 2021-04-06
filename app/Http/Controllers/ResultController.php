<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Project;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function index()
    {
        return view('frontend.home', [
            'projects' => Project::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'choices' => 'required',
            'group_id' => 'nullable',
            'user_id' => 'required'
        ]);
        Result::create($data);
        return back()->with('message', 'Send is Done');
    }

    public function indexAdmin()
    {
        //$results = Result::latest()->get();
        //dd($results[0]->choices);
        return view('backend.results.index', [
            'results' => Result::latest()->get()
        ]);
    }

}
