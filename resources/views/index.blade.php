@extends('layouts.root')

@section('title', 'TechNova Labs - Home')

@section('content')
<div class="hero">
    <h1>Welcome to TechNova Labs</h1>
    <a href="{{ route('programs') }}" class="btn btn-primary">Explore Our Programs</a>
</div>

<section class="container">
    <h2 class="section-title">About Us</h2>
    <p>TechNova Labs is dedicated to pushing the boundaries of technology education and innovation. We offer hands-on learning experiences and cutting-edge research projects in fields like AI, Robotics, and 3D Printing.</p>
</section>

<section class="container py-5 bg-light">
    <h2>What Our Students Say</h2>
    <div class="row">
        <div class="col-md-4">
            <blockquote class="blockquote">
                <p>"TechNova Labs opened new horizons for me in the field of AI. Highly recommend!"</p>
                <footer class="blockquote-footer">Mark, AI Student</footer>
            </blockquote>
        </div>
        <div class="col-md-4">
            <blockquote class="blockquote">
                <p>"Working in the lab helped my career. I learned how to program robots!"</p>
                <footer class="blockquote-footer">Zoe, Robotics Engineer</footer>
            </blockquote>
        </div>
        <div class="col-md-4">
            <blockquote class="blockquote">
                <p>"Thanks to TechNova Labs, I was able to realize my 3D printing projects. Amazing place!"</p>
                <footer class="blockquote-footer">Andrew, Designer</footer>
            </blockquote>
        </div>
    </div>
</section>

<section class="container py-5">
    <h2>Frequently Asked Questions</h2>
    <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    How can I apply to the programs?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                <div class="accordion-body">
                    You can apply through our online form available on the programs page.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    What technologies do you work with?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                <div class="accordion-body">
                    Our labs specialize in AI, robotics, 3D printing, and IoT technologies.
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
