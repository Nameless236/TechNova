@extends('layouts.app')

@section('title', 'Edit Review')

@section('content')
    <div class="container py-5">
        <h1>Edit Review</h1>
        <form action="{{ route('reviews.update', $review->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" class="form-control" rows="3" required>{{ $review->comment }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Update Review</button>
        </form>
    </div>
@endsection
