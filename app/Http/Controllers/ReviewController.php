<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ReviewController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Review::class);

        $review = new Review();
        $action = route('reviews.store');
        $method = 'POST';

        return view('reviews.create', [
            'review' => $review,
            'action' => $action,
            'method' => $method,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Review::class);

        $request->validate([
            'comment' => 'required|string',
            'program_id' => 'required|exists:programs,id',
        ]);

        Review::create([
            'comment' => $request->comment,
            'user_id' => Auth::user()->id,
            'program_id' => $request->program_id,
        ]);

        return redirect()->route('programs.show', $request->program_id)->with('alert', 'Review submitted successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        Gate::authorize('update', $review);

        $action = route('reviews.update', $review->id);
        $method = 'PUT';

        return view('reviews.edit', [
            'review' => $review,
            'action' => $action,
            'method' => $method,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        Gate::authorize('update', $review);

        $request->validate([
            'comment' => 'required|string',
        ]);

        $review->comment = $request->input('comment');
        $review->save();

        return redirect()->route('programs.show', $review->program_id)->with('alert', 'Review updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        Gate::authorize('delete', $review);

        $review->delete();

        return redirect()->route('programs.show', $review->program_id)->with('alert', 'Review deleted successfully.');
    }
}
