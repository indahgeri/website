<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <title>Undangan Pernikahan Elegan</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <!-- AOS Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/classic.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/savethedate.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/components/countdown.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/animations.css'); ?>" rel="stylesheet">
</head>
<body>
    <!-- Cover Section -->
    <section id="cover">
        <div class="bg-coverfoto"></div>

        <div class="title-corner">
            <p data-aos="zoom-in-up" data-aos-duration="1000">The Wedding Of</p>
            <h2 data-aos="fade-up-left" data-aos-offset="100" data-aos-duration="2000">Indah &<br>Gery</h2>
        </div>
        <div class="content-wrapper">
            <div class="kepada">
                <p data-aos="zoom-in-down" data-aos-duration="2000">Kepada Yth.</p>
                <p data-aos="zoom-in-down" data-aos-duration="1000">Bapak/Ibu/Saudara/i</p>
                <div class="nama-tamu" data-aos="fade-up" data-aos-duration="3000"><?= $guest['name']; ?></div>
            </div>
            <a href="#" id="bukaUndangan" class="btn btn-outline-light shadow"><i class="bi bi-envelope-open-fill me-2"></i>Buka Undangan</a>
        </div>
    </section>

    <!-- Section: Save The Date -->
    <section id="save-the-date" class="position-relative min-vh-100">
        <div class="save-the-date-bg animate-zoom"></div>
        
        <!-- Corner Title -->
        <div class="position-absolute start-0 top-0 p-4" style="z-index: 2;">
            <p class="text-uppercase mb-1" style="font-size: 0.8rem; letter-spacing: 2px; opacity: 0.9;" data-aos="fade-down" data-aos-duration="1000">The Wedding Of</p>
            <h2 class="display-4 serif gold mb-2" data-aos="fade-up" data-aos-duration="2000">Indah &<br> Geri</h2>
            <p class="mb-4" data-aos="fade-up" data-aos-duration="2000">Minggu, 26 Juni 2025</p>
        </div>

        <!-- Countdown Timer -->
        <div class="position-absolute bottom-0 start-0 w-100 text-center pb-5" style="z-index: 2;">
            <p class="save-date-text mb-4" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">Save the Date</p>
            
            <div class="countdown-container mx-auto" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                <div class="countdown-box">
                    <div class="countdown-number" id="days">00</div>
                    <div class="countdown-label">Hari</div>
                </div>
                <div class="countdown-box">
                    <div class="countdown-number" id="hours">00</div>
                    <div class="countdown-label">Jam</div>
                </div>
                <div class="countdown-box">
                    <div class="countdown-number" id="minutes">00</div>
                    <div class="countdown-label">Menit</div>
                </div>
                <div class="countdown-box">
                    <div class="countdown-number" id="seconds">00</div>
                    <div class="countdown-label">Detik</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Auto Scroll Control Button -->
    <button id="autoScrollControl" class="floating-button auto-scroll-control" aria-label="Kontrol Auto Scroll">
        <i class="bi bi-pause-circle"></i>
    </button>

    <!-- Back to Top Button -->
    <button id="backToTop" class="floating-button back-to-top" aria-label="Kembali ke atas">
        <i class="bi bi-arrow-up"></i>
    </button>

    <button id="musicButton" class="music-btn" style="display:none">
        <i class="bi bi-music-note"></i>
    </button>
    <audio id="bgMusic" src="/assets/media/the_way_you_look_at_me.webm" loop style="display:none"></audio>

    <footer class="text-center py-3 mt-9" style="background:#181818; color:#d4c4a5;">
        <small>© 2025 Indah & Gery Wedding. All rights reserved.</small>
    </footer>

    <!-- Bootstrap 5 JS + Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Initialize AOS -->
    <script>
        AOS.init();
    </script>
    <script src="<?= base_url('assets/js/apps.js'); ?>"></script>
    <script src="<?= base_url('assets/js/countdown.js'); ?>"></script>
</body>
</html>
