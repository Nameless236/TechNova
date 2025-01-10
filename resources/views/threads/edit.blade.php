@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Thread</h1>

        <form action="{{ route('threads.update', $thread) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $thread->title) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <textarea name="body" id="body" rows="5" class="form-control">{{ old('body', $thread->body) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Thread</button>
        </form>
    </div>
@endsection
