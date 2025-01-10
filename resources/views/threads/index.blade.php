@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Forum Threads</h1>

        <!-- Create Thread Button -->
        @can('create', App\Models\Thread::class)
            <a href="{{ route('threads.create') }}" class="btn btn-primary mb-4">Create New Thread</a>
        @endcan

        <!-- List of Threads -->
        @foreach ($threads as $thread)
            <div class="card-forum">
                <div class="card-forum-body">
                    <h5><a href="{{ route('threads.show', $thread) }}">{{ $thread->title }}</a></h5>
                    <p>{{ Str::limit($thread->body, 100) }}</p>
                    <small>By {{ $thread->user->name }} | {{ $thread->created_at->diffForHumans() }}</small>
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
        @endforeach

        <!-- Pagination Links -->
        {{ $threads->links() }}
    </div>
@endsection
