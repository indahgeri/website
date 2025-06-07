<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indah & Gery - Wedding Profile</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- AOS Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/images/bg/cover.jpg') no-repeat center center;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            color: white;
        }
        .section-title {
            font-family: 'Dancing Script', cursive;
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: #4F8FC0;
        }
        .couple-card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            text-align: center;
        }
        .couple-card:hover {
            transform: translateY(-5px);
        }
        .gallery-card {
            margin-bottom: 30px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .gallery-card img {
            transition: transform 0.3s;
        }
        .gallery-card:hover img {
            transform: scale(1.1);
        }
        .btn-custom {
            background-color: #4F8FC0;
            border-color: #4F8FC0;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #3571a3;
            border-color: #3571a3;
            color: #fff;
        }
        .countdown-item {
            background: linear-gradient(145deg, #ffffff, #f5f5f5);
            padding: 15px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .countdown-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        .countdown-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #4F8FC0;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
            margin-bottom: 5px;
        }
        .countdown-label {
            font-size: 0.9rem;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .pulse {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }
        @media (max-width: 768px) {
            .countdown-number {
                font-size: 2rem;
            }
            .countdown-label {
                font-size: 0.8rem;
            }
            .countdown-item {
                padding: 10px;
            }
        }
        .text-gold {
            color: #4F8FC0;
        }
        .gallery-card.gallery-aspect {
            aspect-ratio: 1/1;
            overflow: hidden;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: box-shadow 0.3s, transform 0.3s;
        }
        .gallery-card.gallery-aspect:hover {
            box-shadow: 0 8px 32px rgba(0,0,0,0.15);
            transform: translateY(-4px) scale(1.03);
        }
        .gallery-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s, filter 0.3s;
        }
        .gallery-card.gallery-aspect:hover .gallery-img {
            transform: scale(1.08);
            filter: brightness(0.92);
        }
        @media (max-width: 767.98px) {
            .gallery-card.gallery-aspect {
                aspect-ratio: 1/1;
                border-radius: 12px;
            }
        }
        @media (max-width: 575.98px) {
            .gallery-card.gallery-aspect {
                aspect-ratio: 1/1;
                border-radius: 10px;
            }
        }
        .couple-card i {
            color: #4F8FC0 !important;
        }
        .btn-outline-primary-custom {
            color: #4F8FC0;
            border-color: #4F8FC0;
        }
        .btn-outline-primary-custom:hover {
            background-color: #4F8FC0;
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-center mx-auto" data-aos="fade-up">
                    <h1 class="display-4 mb-4" style="font-family: 'Dancing Script', cursive;">Indah & Gery</h1>
                    <!-- <p class="lead mb-4">Kami mengundang Anda untuk merayakan pernikahan kami</p> -->
                    <div class="mt-4">
                        <a id="btn-about" class="btn btn-custom btn-lg me-3" style="cursor:pointer;">Tentang Kami</a>
                        <a id="btn-gallery" class="btn btn-outline-light btn-lg" style="cursor:pointer;">Galeri</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <h2 class="text-center section-title" data-aos="fade-up">Tentang Kami</h2>
            <div class="row align-items-center">
                <div class="col-md-6" data-aos="fade-right">
                    <img src="assets/images/bajuadat-indahgery-01.jpg" class="img-fluid rounded" alt="Couple Photo">
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <h3>Cerita Kami</h3>
                    <p>Kami bertemu di tahun 2020 dan sejak saat itu, kami telah berbagi banyak momen indah bersama. Sekarang kami ingin merayakan cinta kami dengan Anda semua.</p>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="couple-card mb-3">
                                <i class="bi bi-person-heart display-6 mb-3 text-warning"></i>
                                <h4>Indah</h4>
                                <p>Putri dari Bpk. Ahmad & Ibu Siti</p>
                                <a href="https://instagram.com/indahprmta____" target="_blank" class="btn btn-sm btn-outline-primary-custom mt-2">
                                    <i class="bi bi-instagram"></i> @indahprmta____
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="couple-card mb-3">
                                <i class="bi bi-person-heart display-6 mb-3 text-warning"></i>
                                <h4>Gery</h4>
                                <p>Putra dari Bpk. Budi & Ibu Rina</p>
                                <a href="https://instagram.com/gery.anuggrahh" target="_blank" class="btn btn-sm btn-outline-primary-custom mt-2">
                                    <i class="bi bi-instagram"></i> @gery.anuggrahh
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center section-title" data-aos="fade-up">Galeri Foto</h2>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up">
                    <div class="gallery-card gallery-aspect">
                        <img src="assets/images/bajuadat-indah.jpg" class="img-fluid gallery-img" alt="Gallery 1">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up">
                    <div class="gallery-card gallery-aspect">
                        <img src="assets/images/bajuadat-gery.jpg" class="img-fluid gallery-img" alt="Gallery 1">
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up">
                    <div class="gallery-card gallery-aspect">
                        <img src="assets/images/bajuadat-indahgery-00.jpg" class="img-fluid gallery-img" alt="Gallery 1">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up">
                    <div class="gallery-card gallery-aspect">
                        <img src="assets/images/bajuadat-indahgery-01.jpg" class="img-fluid gallery-img" alt="Gallery 1">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up">
                    <div class="gallery-card gallery-aspect">
                        <img src="assets/images/bajuadat-indahgery-02.jpg" class="img-fluid gallery-img" alt="Gallery 1">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up">
                    <div class="gallery-card gallery-aspect">
                        <img src="assets/images/bajuadat-indahgery-03.jpg" class="img-fluid gallery-img" alt="Gallery 1">
                    </div>
                </div>


                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up">
                    <div class="gallery-card gallery-aspect">
                        <img src="assets/images/kasual-01.jpg" class="img-fluid gallery-img" alt="Gallery 1">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="gallery-card gallery-aspect">
                        <img src="assets/images/kasual-02.jpg" class="img-fluid gallery-img" alt="Gallery 2">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="gallery-card gallery-aspect">
                        <img src="assets/images/kasual-03.jpg" class="img-fluid gallery-img" alt="Gallery 3">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up">
                    <div class="gallery-card gallery-aspect">
                        <img src="assets/images/kasual-04.jpg" class="img-fluid gallery-img" alt="Gallery 4">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="gallery-card gallery-aspect">
                        <img src="assets/images/kasual-05.jpg" class="img-fluid gallery-img" alt="Gallery 5">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="gallery-card gallery-aspect">
                        <img src="assets/images/kasual-06.jpg" class="img-fluid gallery-img" alt="Gallery 6">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Countdown Section -->
    <section id="countdown" class="py-5">
        <div class="container">
            <h2 class="text-center section-title" data-aos="fade-up">Menuju Hari Bahagia</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-lg border-0" data-aos="fade-up">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <p class="lead text-muted">Pernikahan kami akan diselenggarakan pada:</p>
                                <h4 class="text-gold">26 Juni 2025, 08:00 WIB</h4>
                            </div>
                            <div class="row text-center g-3">
                                <div class="col-6 col-md-3">
                                    <div class="countdown-item pulse">
                                        <div class="countdown-number" id="days">00</div>
                                        <div class="countdown-label">Hari</div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="countdown-item pulse">
                                        <div class="countdown-number" id="hours">00</div>
                                        <div class="countdown-label">Jam</div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="countdown-item pulse">
                                        <div class="countdown-number" id="minutes">00</div>
                                        <div class="countdown-label">Menit</div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="countdown-item pulse">
                                        <div class="countdown-number" id="seconds">00</div>
                                        <div class="countdown-label">Detik</div>
                                    </div>
                                </div>
                            </div>
                            <div id="countdown-info"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Initialize AOS -->
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });

        // Smooth scroll tanpa mengubah hash di URL
        document.getElementById('btn-about').addEventListener('click', function(e) {
            e.preventDefault();
            const section = document.getElementById('about');
            if(section) section.scrollIntoView({ behavior: 'smooth' });
        });
        document.getElementById('btn-gallery').addEventListener('click', function(e) {
            e.preventDefault();
            const section = document.getElementById('gallery');
            if(section) section.scrollIntoView({ behavior: 'smooth' });
        });

        // Countdown Timer
        document.addEventListener('DOMContentLoaded', function() {
            let countdownInterval;
            function updateCountdown() {
                const weddingDate = new Date('2025-06-26T08:00:00+07:00').getTime();
                const now = new Date().getTime();
                const distance = weddingDate - now;
                if (distance < 0) {
                    document.getElementById('days').textContent = '00';
                    document.getElementById('hours').textContent = '00';
                    document.getElementById('minutes').textContent = '00';
                    document.getElementById('seconds').textContent = '00';
                    const info = document.getElementById('countdown-info');
                    if (info) info.innerHTML = '<h2 class="text-center mt-4">Pernikahan telah dimulai!</h2>';
                    clearInterval(countdownInterval);
                    return;
                }
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById('days').textContent = days.toString().padStart(2, '0');
                document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
                document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
                document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
            }
            updateCountdown();
            countdownInterval = setInterval(updateCountdown, 1000);
        });
    </script>
</body>
</html>
