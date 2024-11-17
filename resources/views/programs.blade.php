@extends('layouts.root')

@section('title', 'TechNova Labs - Programs')

@section('content')
<div class="hero text-center py-5 bg-light">
    <h1>Our Programs</h1>
    <p>Explore a variety of hands-on programs designed to drive innovation and creativity in the field of technology.</p>
</div>

<section class="container py-5">
    <h2>Our Featured Programs</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/machine_learning.jpg') }}" class="card-img-top" alt="AI Program">
                <div class="card-body">
                    <h5 class="card-title">AI & Machine Learning Bootcamp</h5>
                    <p class="card-text">An immersive 6-week program that covers the fundamentals of AI and machine learning, focusing on real-world applications.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/robotics.jpg') }}" class="card-img-top" alt="Robotics Program">
                <div class="card-body">
                    <h5 class="card-title">Robotics Development Workshop</h5>
                    <p class="card-text">A 4-week workshop where participants design and build autonomous robots for industry and research purposes.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/3d_modeling.jpg') }}" class="card-img-top" alt="3D Printing Program">
                <div class="card-body">
                    <h5 class="card-title">3D Printing for Innovators</h5>
                    <p class="card-text">Learn how to design, prototype, and produce real-world products using cutting-edge 3D printing technology in this 5-week program.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
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
    <a href="{{ route('contact') }}" class="btn btn-primary">Get in Touch</a>
</section>
@endsection
