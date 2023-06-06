<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::all();
        return view('pages.pages', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            'slug' => 'required'
        ]);

         // Upload image file if present
         if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
        } 
        else {
            $imagePath = null;
        }
        // Create a new user
        $page = new Page();
        $page->img_path = $imagePath;
        $page->title = $request->input('title');
        $page->subtitle = $request->input('subtitle');
        $page->content = $request->input('content');
        $page->slug = $request->input('slug');
        // Save user to database
        $page->save();
        // Redirect to the users page
        return redirect()->route('pages.index')->with('status', 'User created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pages = Page::findOrFail($id);
        
        return view('pages.show', ['page'=>$pages]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pages = Page::findOrFail($id);
        return view('pages.edit', compact('pages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $page = Page::findOrFail($id);

    // Validate input data
    $validatedData = $request->validate([
        'title' => 'required',
        'subtitle' => 'required',
        'content' => 'required',
        'slug' => 'required'
    ]);

    // Update the page with the submitted form data
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('public/images');
        $page->img_path = $imagePath;
    }

    $page->title = $request->input('title');
    $page->subtitle = $request->input('subtitle');
    $page->content = $request->input('content');
    $page->slug = $request->input('slug');

    // Save page to database
    $page->save();

    // Redirect to the pages index page
    return redirect()->route('pages.index')->with('status', 'Page updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Page::destroy($id);
        return redirect()->route('pages.index')->with('status', "User removed successfully!");   
    }
}
