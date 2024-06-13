@extends('layouts.template')

@section('styles')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: #f4f4f4;
        }

        header {
            background: url('images/bantul-banner.jpg') no-repeat center center/cover;
            color: #fff;
            text-align: center;
            padding: 100px 0;
        }

        header h1 {
            margin: 0;
            font-size: 3rem;
        }

        header p {
            font-size: 1.2rem;
        }

        nav {
            background: #333;
            color: #fff;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
        }

        .section {
            padding: 60px 0;
            text-align: center;
            color: #fff;
            position: relative;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form label {
            margin: 10px 0 5px;
        }

        form input, form textarea {
            width: 100%;
            max-width: 400px;
            padding: 10px;
            margin-bottom: 10px;
        }

        form button {
            padding: 10px 20px;
            background: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        form button:hover {
            background: #555;
        }

        footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .btn-primary {
            padding: 10px 20px;
            background: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-primary:hover {
            background: #555;
        }

        #home {
            background: url('{{ asset('storage/images/pinesunrise.jpg') }}') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .content {
            position: relative;
            z-index: 2;
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
        }

        .attraction img, .gallery img {
            width: 300px;
            height: 200px;
            object-fit: cover;
            margin: 10px;
        }

        .attraction h2, .gallery h2 {
            color: #333;
        }

        .attraction p, .gallery p {
            color: #333;
        }

        #welcome-section {
            background: #fff;
            color: #333;
            padding: 60px 0;
        }

        #welcome-section .p-5 {
            padding: 3rem !important;
        }

        #welcome-section .display-4 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        #welcome-section p {
            font-size: 1rem;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        #welcome-section .btn-primary {
            padding: 10px 20px;
            background: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        #welcome-section .btn-primary:hover {
            background: #555;
        }

        #welcome-section .img-fluid {
            width: 100%;
            height: auto;
        }

        #welcome-section .rounded-circle {
            border-radius: 50%;
        }
    </style>
@endsection

@section('header')
    <header>
        <div class="container">
            <h1>Welcome to Bantul</h1>
            <p>Discover the beauty of Bantul, Yogyakarta</p>
        </div>
    </header>
@endsection

@section('nav')
    <nav>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#attractions">Attractions</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#welcome-section">Scenic Image</a></li>
        </ul>
    </nav>
@endsection

@section('content')
    <section id="home" class="section">
        <div class="overlay"></div>
        <div class="container content">
            <h2>Explore Bantul</h2>
            <p>Bantul is a regency located in the southern part of the Yogyakarta Special Region in Indonesia. It's known for its beautiful beaches, cultural heritage, and friendly locals.
                Discover the natural beauty of Bantul through our dedicated platform, Bantul Bercerita. Located in the heart of the Yogyakarta Special Region, Bantul is renowned for its breathtaking landscapes, stunning beaches, lush forests, and vibrant cultural heritage. Whether you are a seasoned traveler or a first-time visitor, our website offers a comprehensive guide to exploring Bantul’s natural wonders.
            </p>
            <div class="button-container">
                <a href="{{ route('index') }}" class="btn btn-primary">Discover More</a>
            </div>
        </div>
    </section>

    <section id="welcome-section" class="section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">Vacation to Avoid Stress!!!</h2>
                        <p>
                            Welcome to Bantul Regency, a hidden paradise in the Yogyakarta Province of Indonesia.
                            This regency, rich in natural beauty, makes for an unforgettable tourist destination.
                            With a harmonious blend of cultural wealth and natural charm, Bantul captivates every visitor.
                            Bantul is known for its stunning beaches. One must-visit is Parangtritis Beach, a mesmerizing beach with its long coastline, soft white sand, and challenging waves.
                            Visitors can enjoy breathtaking sunsets or try the thrilling experience of surfing on tempting waves.
                            Other tourist spots can be seen on the tourism distribution map below.
                            Bantul Bercerita is your gateway to exploring the best natural attractions that Bantul has to offer. From the iconic Parangtritis Beach with its mesmerizing sunsets and thrilling waves to the serene Hutan Pinus (Pine Forest) offering tranquility amidst towering pines, our website covers it all. Each attraction is meticulously documented with high-quality images and detailed descriptions to give you a vivid preview of what awaits.
                        </p>
                        <a class="btn btn-primary btn-xl rounded-pill mt-5" href="{{ route('index') }}">Explore</a>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
                        <img src="{{ asset('image/kebunbuahmangunan.jpg') }}" alt="Scenic Beauty of Bantul" class="img-fluid rounded-circle">
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="gallery" class="section gallery">
        <div class="container">
            <h2>Gallery</h2>
            <p>Check out our gallery of beautiful sights in Bantul.</p>
            <img src="image/hutanpinus.jpg" alt="Hutan Pinus">
            <img src="image/jurangtembelan.jpg" alt="Jurang Tembelan">
            <img src="image/gumukpasir.jpg" alt="Gunuk Pasir">
            <img src="image/kebunbuahmangunan.jpg" alt="Kebun Buah Mangunan">
            <img src="image/puncakbecici.jpg" alt="Puncak Becici">
            <img src="image/goacemara.jpg" alt="Goacemara">
            <img src="image/lagunadepok.jpeg" alt="Laguna Depok">
            <img src="image/lintang.png" alt="Bukit Lintang">
            <img src="image/parangkusumo.jpg" alt="Pantai Parangkusumo">
            <img src="image/parangtritis.jpg" alt="Pantai Parangtritis">
            <img src="image/pengilon.jpeg" alt="Bukit Pengilon">
            <img src="image/sosok.jpg" alt="Puncak Sosok">

        </div>
    </section>
@endsection

@section('footer')
    <footer>
        <div class="container">
            <p>&copy; 2024 Bantul Tourism. All Rights Reserved.</p>
        </div>
    </footer>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const navLinks = document.querySelectorAll('nav ul li a');

            navLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const targetId = e.target.getAttribute('href').substring(1);
                    const targetSection = document.getElementById(targetId);

                    window.scrollTo({
                        top: targetSection.offsetTop,
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
@endsection
