@extends('layouts.root')

@section('title', 'TechNova Labs - Programs')

@section('content')
    <div class="container py-5">
        <div class="col-12">
            <img src="{{ asset('storage/' . $program->imagePath) }}" class="img-fluid img-detail" alt="{{ $program->title }}">
            <h1>{{ $program->title }}</h1>
            <p class="text-description">{{ $program->description }}</p>
        </div>
        <div class="mt-4">
            <a href="{{ route('programs.edit', $program->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('programs.destroy', $program->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="confirmDelete({{ $program->id }})">Delete</button>
            </form>
        </div>
    </div>
@endsection
