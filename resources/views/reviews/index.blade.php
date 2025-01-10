@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $program->title }}</h1>
        <p>{{ $program->description }}</p>
        <img src="{{ Storage::url($program->imagePath) }}" alt="{{ $program->title }}" class="img-fluid">

        <h2>Reviews</h2>
        @if($reviews->count())
            <ul class="list-group">
                @foreach($reviews as $review)
                    <li class="list-group-item">
                        <p>{{ $review->comment }}</p>
                        <small>By User ID: {{ $review->user_id }}</small>
                    </li>
                @endforeach
            </ul>
            {{ $reviews->links() }}
        @else
            <p>No reviews yet.</p>
        @endif
    </div>
@endsection
