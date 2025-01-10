@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a New Thread</h1>

        <form action="{{ route('threads.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <textarea name="body" id="body" rows="5" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create Thread</button>
        </form>
    </div>
@endsection
