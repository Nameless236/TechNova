@extends('layouts.root')

@section('title', 'TechNova Labs - Programs')

@section('content')
    <div class="container py-5">
        <h2>{{ $program->title }}</h2>
        <img src="{{ asset('storage/' . $program->imagePath) }}" class="img-fluid mb-3" alt="{{ $program->title }}">
        <p>{{ $program->description }}</p>
        <a href="{{ route('programs.index') }}" class="btn btn-secondary">Back to Programs</a>
    </div>
@endsection
