@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Reply</h1>

        <form action="{{ route('replies.update', ['reply' => $reply]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="body" class="form-label">Your Reply</label>
                <textarea name="body" id="body" rows="3" class="form-control" required>{{ old('body', $reply->body) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Reply</button>
        </form>
    </div>
@endsection
