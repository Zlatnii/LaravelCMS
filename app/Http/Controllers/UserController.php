<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guest()) {
            return redirect()->route('login');
        }else{ 
        $users = User::all(); // Fetch all users from the database
        return view('users.user', ['users' => $users]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ], 
        [
            'password.confirmed' => 'The password confirmation does not match.'
        ]);

         // Upload image file if present
         if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
        } 
        else {
            $imagePath = null;
        }
        // Create a new user
        $user = new User();
        $user->img_path = $imagePath;
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password_confirmation'));


        // Save user to database
        $user->save();

        // Redirect to the users page
        return redirect()->route('users.index')->with('status', 'User created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        // Validate input data
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
        ]);
        
        // Update the user with the submitted form data
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        // Delete the image file if it exists and if file doesn't exist save without image
        if($request->hasFile('image')){ 
        $imagePath = $request->file('image')->store('public/images');
            if($user->img_path){
                Storage::delete($user->img_path);
            }
        // Update the image path in the user record
            $user->img_path = $imagePath;
        }else{
           $user->img_path = null;
        }
        //Save changes
        $user->save(); 
        return redirect()->route('users.index')->with('status', 'User updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->route('users.index')->with('status', "User removed successfully!");
    }
}