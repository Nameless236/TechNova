@extends('layouts.root')

@section('title', 'TechNova Labs - Contact Us')

@section('content')
<div class="hero">
    <h1>Contact Us</h1>
</div>

<section class="container py-5">
    <h2 class="section-title">Get in Touch</h2>
    <p>If you have any questions or would like to learn more about TechNova Labs, feel free to reach out!</p>
    <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>
@endsection
