<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::paginate(10); // Adjust the number of items per page as needed
        return view('programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $program = new Program();
        $action = route('programs.store');
        $method = 'POST';

        return view('programs.create', [
            'program' => $program,
            'action' => $action,
            'method' => $method,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('program_images', 'public');

        Program::create([
            'title' => $request->title,
            'description' => $request->description,
            'imagePath' => $imagePath,
        ]);

        return redirect()->route('programs.index')->with('alert', 'Program created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        return view('programs.show', ['program' => $program]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        $action = route('programs.update', $program->id);
        $method = 'PUT';

        return view('programs.edit', compact('program', 'action', 'method'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:35',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $program->title = $request->input('title');
        $program->description = $request->input('description');

        if ($request->hasFile('image')) {
            // Delete the old image from storage
            if ($program->imagePath) {
                Storage::disk('public')->delete($program->imagePath);
            }

            // Handle the new image upload
            $imagePath = $request->file('image')->store('program_images', 'public');
            $program->imagePath = $imagePath;
        }

        $program->save();

        return redirect()->route('programs.index')->with('alert', 'Program updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program): RedirectResponse
    {
        // Delete the image file from storage
        if ($program->imagePath) {
            Storage::disk('public')->delete($program->imagePath);
        }

        // Delete the program from the database
        $program->delete();

        // Redirect to the index page with a success message
        return redirect()->route('programs.index')->with('alert', 'Program deleted successfully.');
    }
}
