@extends('layouts.app')

@section('title', 'TechNova Labs - Programs')

@section('content')
    <div class="container py-5 show-program-contents">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $program->imagePath) }}" class="img-fluid img-detail" alt="{{ $program->title }}">
            </div>
            <div class="col-md-6 d-flex flex-column">
                <h1>{{ $program->title }}</h1>
                <p class="text-description">{{ $program->description }}</p>
            </div>
        </div>
        @can('update', $program)
            <div class="mt-4">
                <a href="{{ route('programs.edit', $program->id) }}" class="btn btn-primary">Edit</a>
            </div>
        @endcan
        @can('delete', $program)
            <form action="{{ route('programs.destroy', $program->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="confirmDelete({{ $program->id }})">Delete</button>
            </form>
        @endcan

        <div class="review-section">
            <h2>Reviews</h2>
            @if($reviews->count())
                <ul class="list-group review-list">
                    @foreach($reviews as $review)
                        <li class="list-group-item">
                            <p>{{ $review->comment }}</p>
                            <small>By {{ $review->user->name}}</small>
                            @can('update', [App\Models\Review::class, $review])
                                <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                            @endcan
                            @can('delete', $review)
                                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this review?')">Delete</button>
                                </form>
                            @endcan
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No reviews yet.</p>
            @endif

            @auth
                <h3>Leave a Review</h3>
                <form action="{{ route('reviews.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="program_id" value="{{ $program->id }}">
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit Review</button>
                </form>
            @endauth
        </div>
    </div>
@endsection
