@extends('layouts.root')

@section('title', 'TechNova Labs - Programs')

@section('content')
<div class="hero text-center py-5 bg-light">
    <h1>Our Programs</h1>
    <p>Explore a variety of hands-on programs designed to drive innovation and creativity in the field of technology.</p>
    @can('create', App\Models\Program::class)
        <a href="{{ route('programs.create') }}" class="btn btn-primary mb-3">Create New Program</a>
    @endcan
</div>

<section class="container py-5">
    <h2>Our Featured Programs</h2>
    <div class="row">
        @foreach($programs as $program)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('storage/' . $program->imagePath) }}" class="card-img-top" alt="{{ $program->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $program->title }}</h5>
                        <p class="card-text">{{ Str::limit($program->description, 30) }}</p>
                        <a href="{{ route('programs.show', $program->id) }}" class="btn btn-primary">Learn More</a>
                    </div>
                    @can('update', $program)
                    <div class="card-actions position-absolute top-0 end-0 p-2">
                        <a href="{{ route('programs.edit', $program->id) }}" class="btn btn-sm btn-outline-secondary me-1">
                            <i class="bi bi-pencil"></i>
                        </a>
                        @endcan
                        @can('delete', $program)
                        <form id="deleteForm-{{ $program->id }}" action="{{ route('programs.destroy', $program->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete({{ $program->id }})">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </form>
                    </div>
                    @endcan
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $programs->links() }}
    </div>
</section>

<section class="container py-5">
    <h2>How to Enroll</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Step 1: Choose a Program</h5>
                    <p>Select the program that aligns with your interests and skill level from our diverse offerings.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Step 2: Apply Online</h5>
                    <p>Submit your application through our online portal, and our team will review it for eligibility.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Step 3: Get Started</h5>
                    <p>Once accepted, you’ll receive all the details and materials you need to start learning with us!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container py-5 bg-light">
    <h2>What Our Participants Say</h2>
    <div class="row">
        <div class="col-md-6">
            <blockquote class="blockquote">
                <p>"The AI Bootcamp transformed my understanding of machine learning. It was challenging but rewarding!"</p>
                <footer class="blockquote-footer">Emily, AI Engineer</footer>
            </blockquote>
        </div>
        <div class="col-md-6">
            <blockquote class="blockquote">
                <p>"The 3D printing course was incredibly hands-on. I was able to prototype my ideas and bring them to life!"</p>
                <footer class="blockquote-footer">James, Product Designer</footer>
            </blockquote>
        </div>
    </div>
</section>

<section class="container py-5 text-center">
    <h2>Ready to Join?</h2>
    <p>Discover how our programs can help you advance your career and skillset in tech innovation.</p>
    <a href="{{ route('contact.index') }}" class="btn btn-primary">Get in Touch</a>
</section>
@endsection
