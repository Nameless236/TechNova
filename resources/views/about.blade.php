@extends('layouts.root')

@section('title', 'TechNova Labs - About Us')

@section('content')
<div class="hero text-center py-5 bg-light">
    <h1>About TechNova Labs</h1>
    <p>Learn more about our mission, vision, and the team that drives innovation.</p>
</div>

<section class="container py-5">
    <h2>Our Mission</h2>
    <p>At TechNova Labs, our mission is to drive technological innovation through collaboration, research, and hands-on experience. We aim to foster a culture of creativity where aspiring technologists can develop groundbreaking solutions for real-world challenges.</p>

    <h2>Our Vision</h2>
    <p>We envision a future where technology empowers everyone to create, innovate, and solve the problems of tomorrow. By providing access to state-of-the-art labs and expert mentorship, we aim to make TechNova Labs a global hub for technological progress.</p>
</section>

<section class="container py-5">
    <h2>Meet Our Team</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/ceo_Jane.jpg') }}" class="card-img-top" alt="CEO">
                <div class="card-body">
                    <h5 class="card-title">Jane Doe</h5>
                    <p class="card-text">CEO & Founder</p>
                    <p>Jane leads TechNova Labs with over 20 years of experience in AI and robotics. Her vision is to create a lab that empowers tech enthusiasts worldwide.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/cto_John.jpg') }}" class="card-img-top" alt="CTO">
                <div class="card-body">
                    <h5 class="card-title">John Smith</h5>
                    <p class="card-text">CTO</p>
                    <p>John oversees the lab's technological initiatives, ensuring that we use the latest technologies in our projects and programs.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/dr_Sarah.jpg') }}" class="card-img-top" alt="Head of Research">
                <div class="card-body">
                    <h5 class="card-title">Dr. Sarah Lee</h5>
                    <p class="card-text">Head of Research</p>
                    <p>With a PhD in Machine Learning, Sarah leads our research division, ensuring that we stay at the forefront of AI development.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container py-5">
    <h2>Our Journey</h2>
    <ul class="timeline">
        <li>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">Founded in 2015</h4>
                </div>
                <div class="timeline-body">
                    <p>TechNova Labs was founded by a group of tech enthusiasts looking to create a space where innovation thrives.</p>
                </div>
            </div>
        </li>
        <li>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">First AI Research Project (2017)</h4>
                </div>
                <div class="timeline-body">
                    <p>Our first major project focused on applying AI to healthcare solutions, paving the way for future research endeavors.</p>
                </div>
            </div>
        </li>
        <li>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">Expansion to Robotics (2019)</h4>
                </div>
                <div class="timeline-body">
                    <p>We expanded our scope to include robotics, starting with a project to develop autonomous drones for industrial applications.</p>
                </div>
            </div>
        </li>
        <li>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">Opening Global Research Labs (2022)</h4>
                </div>
                <div class="timeline-body">
                    <p>With labs in five countries, we are now a global player in AI and robotics research.</p>
                </div>
            </div>
        </li>
    </ul>
</section>

<section class="container py-5 bg-light">
    <h2>Fun Facts About Us</h2>
    <div class="row">
        <div class="col-md-4">
            <h3>50+</h3>
            <p>Research papers published in top-tier conferences and journals.</p>
        </div>
        <div class="col-md-4">
            <h3>5 Countries</h3>
            <p>We operate labs in five different countries, fostering global collaboration.</p>
        </div>
        <div class="col-md-4">
            <h3>1000+</h3>
            <p>Students and professionals have attended our workshops and research programs.</p>
        </div>
    </div>
</section>

<section class="container py-5 text-center">
    <h2>Join Our Mission</h2>
    <p>Are you passionate about technology and innovation? Be a part of our community and help shape the future.</p>
    <a href="{{ route('contact') }}" class="btn btn-primary">Contact Us</a>
</section>
@endsection
