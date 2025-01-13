<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReplyController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Thread $thread)
    {
        Gate::authorize('create', Reply::class);
        // Validate the reply body
        $validated = $request->validate([
            'body' => 'required|string',
        ]);

        // Create the reply
        Reply::create([
            'body' => $validated['body'],
            'thread_id' => $thread->id,
            'user_id' => auth()->id(),
        ]);

        // Calculate the total number of replies
        $totalReplies = $thread->replies()->count();

        // Define replies per page (same as in your pagination logic)
        $repliesPerPage = 5;

        // Calculate the page number for redirection
        $page = ceil($totalReplies / $repliesPerPage);

        // Redirect to the thread with the correct page number
        return redirect()->route('threads.show', ['thread' => $thread->id, 'page' => $page])
            ->with('success', 'Reply added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reply $reply)
    {
        // Authorize that the user can edit this reply
        Gate::authorize('update', $reply);

        return view('replies.edit', compact('reply'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reply $reply)
    {
        // Authorize that the user can update this reply
        Gate::authorize('update', $reply);

        // Validate the input
        $validated = $request->validate([
            'body' => 'required|string',
        ]);

        // Update the reply (Laravel automatically updates `updated_at`)
        $reply->update([
            'body' => $validated['body'],
        ]);

        return redirect()->route('threads.show', ['thread' => $reply->thread_id])
            ->with('success', 'Reply updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reply $reply)
    {
        // Authorize that the user can delete this reply
        Gate::authorize('delete', $reply);

        // Delete the reply
        $reply->delete();

        return redirect()->back()->with('success', 'Reply deleted successfully!');
    }
}
