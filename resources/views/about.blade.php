@extends('user.home')

@section('title', 'about')

@section('about')
    <div class="about-section">
        <div class="container">
            <h1>About Us</h1>
            <div class="about-content">
                <div class="about-text">
                    <h2>Who We Are</h2>
                    <p>We are a global company passionate about innovation and creating solutions that change the world. 
                        Our team is made up of professionals from diverse backgrounds who are committed to driving excellence.</p>
                    <p>Our mission is to provide high-quality products that meet the needs of customers all around the globe, while also promoting a culture of inclusivity, sustainability, and growth.</p>
                </div>
                <div class="about-image">
                    <img src="https://www.shutterstock.com/image-photo/about-us-business-team-hands-260nw-446870920.jpg" alt="About Us Image">
                </div>
            </div>

            <div class="icon-section">
                <i class="fas fa-globe"></i>
                <i class="fas fa-users"></i>
                <i class="fas fa-chart-line"></i>
            </div>
        </div>
    </div>
@endsection