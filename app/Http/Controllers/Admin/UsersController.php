<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get()->map(function ($role) {
            return $role['role'];
        });
        return view('admin.users.create', [
            'user' => [],
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'active' => $request->active ? true : false,
            'type' => $request->type + 1,
            'password' => Hash::make($request->password)
        ]);

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get()->map(function ($role) {
            return $role['role'];
        });
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateArray = [
            'name' => $request->name,
            'email' => $request->email,
            'active' => $request->active ? true : false,
            'type' => $request->type + 1
        ];

        if (isset($request->password)) {
            $updateArray['password'] = Hash::make($request->password);
        }

        User::where('id', $id)->update($updateArray);

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect(route('admin.users.index'));
    }
}
