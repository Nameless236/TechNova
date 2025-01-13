<?php

namespace App\Http\Controllers;


use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Thread::class);
        $threads = Thread::latest()->paginate(10);
        return view('threads.index', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Thread::class);
        return view('threads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if the user is authorized to create a thread
        Gate::authorize('create', Thread::class);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
        ]);

        Thread::create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('threads.index')->with('success', 'Thread created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Thread $thread)
    {
        Gate::authorize('view', $thread);
        // Paginate replies with 5 per page (adjust as needed)
        $replies = $thread->replies()->oldest()->paginate(5);

        // Pass both the thread and paginated replies to the view
        return view('threads.show', compact('thread', 'replies'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thread $thread)
    {
        // Authorize that the user has permission to edit this thread
        Gate::authorize('update', $thread);

        // Return the edit view with the thread data
        return view('threads.edit', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Thread $thread)
    {
        // Check if the user is authorized to update this thread
        Gate::authorize('update', $thread);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
        ]);

        $thread->update($validated);

        return redirect()->route('threads.show', $thread)->with('success', 'Thread updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thread $thread)
    {
        // Check if the user is authorized to delete this thread
        Gate::authorize('delete', $thread);

        $thread->delete();

        return redirect()->route('threads.index')->with('success', 'Thread deleted successfully!');
    }
}
