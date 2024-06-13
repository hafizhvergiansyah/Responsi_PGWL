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
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .attraction {
            margin: 20px 0;
        }

        .carousel {
            display: flex;
            overflow: hidden;
            position: relative;
        }

        .carousel img {
            width: 100%;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-buttons {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .carousel-buttons button {
            background: rgba(0, 0, 0, 0.5);
            border: none;
            color: #fff;
            padding: 10px;
            cursor: pointer;
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
        </ul>
    </nav>
@endsection

@section('content')
    <section id="home" class="section">
        <div class="container">
            <h2>Explore Bantul</h2>
            <p>Bantul is a regency located in the southern part of the Yogyakarta Special Region in Indonesia. It's known for its beautiful beaches, cultural heritage, and friendly locals.</p>
        </div>
    </section>

    <section id="attractions" class="section">
        <div class="container">
            <h2>Top Attractions</h2>
            <div class="carousel" id="attractionCarousel">
                <img src="images/parangtritis.jpg" alt="Parangtritis Beach">
                <img src="images/imogiri.jpg" alt="Imogiri Pine Forest">
                <img src="images/timang.jpg" alt="Timang Beach">
            </div>
            <div class="carousel-buttons">
                <button id="prevBtn">&lt;</button>
                <button id="nextBtn">&gt;</button>
            </div>
        </div>
    </section>

    <section id="gallery" class="section">
        <div class="container">
            <h2>Gallery</h2>
            <div class="carousel" id="galleryCarousel">
                <img src="images/parangtritis.jpg" alt="Parangtritis Beach">
                <img src="images/imogiri.jpg" alt="Imogiri Pine Forest">
                <img src="images/timang.jpg" alt="Timang Beach">
            </div>
            <div class="carousel-buttons">
                <button id="prevGalleryBtn">&lt;</button>
                <button id="nextGalleryBtn">&gt;</button>
            </div>
        </div>
    </section>

    <section id="contact" class="section">
        <div class="container">
            <h2>Contact Us</h2>
            <form>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
                <button type="submit">Send</button>
            </form>
        </div>
    </section>
@endsection

@section('footer')
    <footer>
        <div class="container">
            <p>&copy; 2024 Bantul Bercerita. All rights reserved.</p>
        </div>
    </footer>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const navLinks = document.querySelectorAll('nav ul li a');
            const attractionCarousel = document.getElementById('attractionCarousel');
            const galleryCarousel = document.getElementById('galleryCarousel');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const prevGalleryBtn = document.getElementById('prevGalleryBtn');
            const nextGalleryBtn = document.getElementById('nextGalleryBtn');
            let attractionIndex = 0;
            let galleryIndex = 0;

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

            function showAttractionSlide(index) {
                const slides = attractionCarousel.getElementsByTagName('img');
                if (index >= slides.length) {
                    attractionIndex = 0;
                } else if (index < 0) {
                    attractionIndex = slides.length - 1;
                } else {
                    attractionIndex = index;
                }
                attractionCarousel.style.transform = `translateX(-${attractionIndex * 100}%)`;
            }

            function showGallerySlide(index) {
                const slides = galleryCarousel.getElementsByTagName('img');
                if (index >= slides.length) {
                    galleryIndex = 0;
                } else if (index < 0) {
                    galleryIndex = slides.length - 1;
                } else {
                    galleryIndex = index;
                }
                galleryCarousel.style.transform = `translateX(-${galleryIndex * 100}%)`;
            }

            prevBtn.addEventListener('click', () => showAttractionSlide(attractionIndex - 1));
            nextBtn.addEventListener('click', () => showAttractionSlide(attractionIndex + 1));
            prevGalleryBtn.addEventListener('click', () => showGallerySlide(galleryIndex - 1));
            nextGalleryBtn.addEventListener('click', () => showGallerySlide(galleryIndex + 1));

            showAttractionSlide(attractionIndex);
            showGallerySlide(galleryIndex);
        });
    </script>
@endsection
