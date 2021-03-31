<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.users.index', [
            'users' => User::query()
            ->when('search', function($query){
                $query->search(request('search'));
            })->latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create', [
            'groups' => Group::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'is_admin' => 'nullable|in:0,1',
            'dept' => 'nullable',
            'year' => 'nullable',
            'first_avg' => 'nullable',
            'second_avg' => 'nullable',
            'global_avg' => 'nullable',
            'group_id' => 'nullable',
            'password' => 'nullable|confirmed|min:6',
        ]);

        $first = $request->first_avg;
        $second = $request->second_avg;
        $global = ($first + $second) / 2;
        $data['global_avg'] = $global;
        $data['password'] = Str::random(8);
        User::create($data);
        return $this->redirectRoutes('admin.user.index', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('backend.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backend.users.update', [
            'user' => $user,
            'groups' => Group::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request,User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'is_admin' => 'nullable|in:0,1',
            'dept' => 'nullable',
            'year' => 'nullable',
            'first_avg' => 'nullable',
            'second_avg' => 'nullable',
            'global_avg' => 'nullable',
            'group_id' => 'nullable',
            'password' => 'nullable',
        ]);

        $first = $request->first_avg;
        $second = $request->second_avg;
        $global = ($first + $second) / 2;
        $data['global_avg'] = $global;
        if ($request->password == null) {
            $data['password'] = Str::random(8);
        }
        $user->update($data);
        return $this->redirectRoutes('admin.user.index', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return $this->redirectRoutes('admin.user.index', 'User deleted successfully');
    }
}
