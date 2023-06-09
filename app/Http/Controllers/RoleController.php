<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guest()) {
            return redirect()->route('login');
        }else{ 
        $roles = Role::all(); // Fetch all roles from the database
        return view('roles.roles', ['roles' => $roles]);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        //create new role
        $role = new Role();
        $role->name = $validate['name'];
        $role->slug = $validate['slug'];

        $role->save();
        return redirect()->route('roles.index')->with('status', 'User created successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $role->name = $validatedData['name'];
        $role->slug = $validatedData['slug'];
        $role->save();
        return redirect()->route('roles.index')->with('status', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()->route('roles.index')->with('status', "User removed successfully!");
    }

    public function getRoleName($roleId)
    {
        $role = Role::find($roleId);

        if ($role) {
            return $role->name;
    }else{ 

        return 'No Role';
    }
    
    }
}
