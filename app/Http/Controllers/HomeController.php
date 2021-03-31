<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminDash()
    {
        return view('backend.dashboard',[
            'users' => User::all(),
            'groups' => Group::all(),
            'projects' => Project::all()
        ]);
    }

    public function studentInfo()
    {
        return view('backend.users.students',[
            'users' => User::latest()->get()
        ]);
    }

}
