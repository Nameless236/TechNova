@extends('layouts.app')

@section('title', 'TechNova Labs - Innovations')

@section('content')
<div class="hero text-center py-5 bg-light">
    <h1>Our Innovations</h1>
    <p>Leading the way in cutting-edge technology and groundbreaking research that shapes the future.</p>
</div>

<section class="container py-5">
    <h2>Featured Innovations</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/robotics.jpg') }}" class="card-img-top" alt="Drone Innovation">
                <div class="card-body">
                    <h5 class="card-title">Autonomous Drone Swarm</h5>
                    <p class="card-text">Our drone technology research focuses on autonomous swarming, enabling multiple drones to perform complex tasks collaboratively without human intervention.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/machine_learning.jpg') }}" class="card-img-top" alt="AI Assistant">
                <div class="card-body">
                    <h5 class="card-title">AI Personal Assistant</h5>
                    <p class="card-text">Developing advanced AI-driven personal assistants that leverage natural language processing and machine learning to assist in daily tasks and decision-making.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/biotech.jpg') }}" class="card-img-top" alt="Biotech Innovation">
                <div class="card-body">
                    <h5 class="card-title">Biotechnology in Medicine</h5>
                    <p class="card-text">Our biotechnology division is creating breakthroughs in personalized medicine, allowing for targeted therapies based on individual genetic profiles.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container py-5">
    <h2>Our Innovation Timeline</h2>
    <div class="timeline">
        <ul class="timeline-list">
            <li>
                <div class="timeline-content">
                    <h5>2020 - AI-Powered Healthcare Solutions</h5>
                    <p>Launched an AI platform that assists doctors in diagnosing diseases faster and more accurately using big data and machine learning algorithms.</p>
                </div>
            </li>
            <li>
                <div class="timeline-content">
                    <h5>2021 - Autonomous Vehicle Program</h5>
                    <p>Started developing a fully autonomous vehicle that can navigate complex urban environments with safety and efficiency.</p>
                </div>
            </li>
            <li>
                <div class="timeline-content">
                    <h5>2022 - Quantum Computing Research</h5>
                    <p>Entered the quantum computing field, developing algorithms that leverage quantum mechanics for faster and more powerful computational processes.</p>
                </div>
            </li>
            <li>
                <div class="timeline-content">
                    <h5>2023 - Smart Cities Initiative</h5>
                    <p>Launched a project focused on integrating IoT and AI technologies to create smarter, more efficient urban infrastructure.</p>
                </div>
            </li>
        </ul>
    </div>
</section>

<section class="container py-5">
    <h2>Meet Our Innovators</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/ceo_Jane.jpg') }}" class="card-img-top" alt="Team Member">
                <div class="card-body">
                    <h5 class="card-title">Dr. Sarah Johnson</h5>
                    <p class="card-text">Lead Researcher, AI & Machine Learning</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/cto_John.jpg') }}" class="card-img-top" alt="Team Member">
                <div class="card-body">
                    <h5 class="card-title">Dr. Mark Thompson</h5>
                    <p class="card-text">Lead Researcher, Quantum Computing</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/dr_Sarah.jpg') }}" class="card-img-top" alt="Team Member">
                <div class="card-body">
                    <h5 class="card-title">Dr. Emily White</h5>
                    <p class="card-text">Head of Robotics and Automation</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container py-5">
    <h2>Have an Idea? Submit it to Us!</h2>
    <form>
        <div class="mb-3">
            <label for="ideaName" class="form-label">Idea Name</label>
            <input type="text" class="form-control" id="ideaName" required>
        </div>
        <div class="mb-3">
            <label for="ideaDescription" class="form-label">Idea Description</label>
            <textarea class="form-control" id="ideaDescription" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="yourEmail" class="form-label">Your Email</label>
            <input type="email" class="form-control" id="yourEmail" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit Idea</button>
    </form>
</section>
@endsection
