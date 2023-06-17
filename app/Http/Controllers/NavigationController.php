<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use App\Models\Page;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function index()
    {
        $navigations = Navigation::all();
        $pages = Page::all();

        return view('navigations.view', compact('navigations', 'pages'));
    }

    public function show($id)
    {
        $navigation = Navigation::findOrFail($id);
        $pages = Page::all();

        return view('navigations.show', compact('navigations', 'pages'));
    }

    public function create()
    {
        $pages = Page::all();
        $navigations = Navigation::all();
        return view('navigations.create', compact('navigations', 'pages'));
    }

    public function edit($id)
    {
        $navigation = Navigation::findOrFail($id);
        $pages = Page::all();

        return view('navigations.edit', compact('navigation', 'pages'));
    }

    public function update(Request $request, $id)
    {   
        $navigation = Navigation::findOrFail($id);
        
        // Validate input data
        $validatedData = $request->validate([
            'name' => 'required',
            'page' => 'nullable'
        ]);
        
        // Update navigation
        $navigation->name = $request->input('name');
        $navigation->page = $request->input('page');
        
        $navigation->save();
        
        return redirect()->route('navigations.view', ['navigation' => $navigation->id])->with('status', 'Navigation updated successfully!');    }

    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'name' => 'required',
            'page' => 'nullable'
        ]);

        // Create new navigation
        $navigation = new Navigation();
        $navigation->name = $request->input('name');
        $navigation->page = $request->input('page');

        $navigation->save();
        
        return redirect()->route('navigations.view')->with('status', 'Navigation created successfully!');
    }

    public function destroy($id)
    {
        Navigation::destroy($id);
        return redirect()->route('navigations.index')->with('status', 'Navigation deleted successfully!');
    }

    public function view()
    {
        $pages = Page::all();
        $navigations = Navigation::all();
        return view('navigations.view', compact('navigations', 'pages'));
    }
}
