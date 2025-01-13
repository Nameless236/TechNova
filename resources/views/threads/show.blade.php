@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Main Thread Section -->
        <div class="card-forum thread-question mt-4">
            <div class="card-forum-body">
                <h1 class="card-title">{{ $thread->title }}</h1>
                <p class="card-text">{{ $thread->body }}</p>
                <small class="text-muted">By {{ $thread->user->name }} | {{ $thread->created_at->diffForHumans() }}</small>
            </div>

            <!-- Buttons Aligned to the Right -->
            <div class="card-forum-buttons">
                @can('update', $thread)
                    <a href="{{ route('threads.edit', $thread) }}" class="btn btn-warning btn-sm">Edit</a>
                @endcan
                @can('delete', $thread)
                    <form action="{{ route('threads.destroy', $thread) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                @endcan
            </div>
        </div>

        <!-- Replies Section -->
        <h2 class="mt-4">Replies</h2>

        <!-- Replies List -->
        @foreach ($replies as $reply)
            <div class="card-forum mt-3">
                <div class="card-forum-body">
                    <p>{{ $reply->body }}</p>

                    @if ($reply->updated_at != $reply->created_at)
                        <small class="text-muted">(Edited {{ $reply->updated_at->diffForHumans() }})</small>
                    @endif

                    <small class="text-muted">By {{ $reply->user->name }} | {{ $reply->created_at->diffForHumans() }}</small>
                </div>

                <!-- Edit and Delete Buttons -->
                <div class="card-forum-buttons">
                    @can('update', $reply)
                        <a href="{{ route('replies.edit', ['reply' => $reply]) }}" class="btn btn-warning btn-sm">Edit</a>
                    @endcan
                    @can('delete', $reply)
                        <form action="{{ route('replies.destroy', ['reply' => $reply]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    @endcan
                </div>
            </div>
        @endforeach

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            {{ $replies->links() }}
        </div>

        <!-- Add Reply Form -->
        @auth
            <div class="mt-4">
                <h3>Add a Reply</h3>
                <form action="{{ route('replies.store', ['thread' => $thread]) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="body" class="form-label">Your Reply</label>
                        <textarea name="body" id="body" rows="3" class="form-control" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Post Reply</button>
                </form>
            </div>
        @endauth
    </div>
@endsection
