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
    <link href="<?= base_url('assets/css/style.css?v='.filemtime(FCPATH.'assets/css/style.css')); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/classic.css?v='.filemtime(FCPATH.'assets/css/classic.css')); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/savethedate.css?v='.filemtime(FCPATH.'assets/css/savethedate.css')); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/components/countdown.css?v='.filemtime(FCPATH.'assets/css/components/countdown.css')); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/animations.css?v='.filemtime(FCPATH.'assets/css/animations.css')); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/profile.css?v='.filemtime(FCPATH.'assets/css/profile.css')); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/story.css?v='.filemtime(FCPATH.'assets/css/story.css')); ?>" rel="stylesheet">
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
            <p class="mb-4" data-aos="fade-up" data-aos-duration="2000">Kamis, 26 Juni 2025</p>
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

    <!-- Section 1: Profil Mempelai Wanita -->
    <section id="profil-wanita" class="profile-section">
        <div class="profile-bg-slideshow" id="slideshow-wanita">
            <div class="profile-bg-slide active" style="background-image: url('/assets/images/bajuadat-indah.jpg')"></div>
        </div>
        <div class="profile-overlay"></div>
        <div class="profile-content" data-aos="zoom-in-down" data-aos-delay="100" data-aos-duration="2000">
            <div class="profile-card">
                <div class="minang-border" style="pointer-events: none;"></div>
                <svg class="minang-ornament-svg top-left" viewBox="0 0 100 100">
                    <use href="#minang-corner"/>
                </svg>
                <svg class="minang-ornament-svg top-right" viewBox="0 0 100 100">
                    <use href="#minang-corner"/>
                </svg>
                <svg class="minang-ornament-svg bottom-left" viewBox="0 0 100 100">
                    <use href="#minang-corner"/>
                </svg>
                <svg class="minang-ornament-svg bottom-right" viewBox="0 0 100 100">
                    <use href="#minang-corner"/>
                </svg>
                <div class="profile-image-wrapper">
                    <div class="profile-image">
                        <img src="/assets/images/bajuadat-indah.jpg" alt="Indah">
                    </div>
                </div>
                <div class="profile-text">
                    <h3 class="serif">Indah Permata Sari S.Ikom</h3>
                    <p class="gold-light">Putri dari</p>
                    <p class="parents-name">
                        Bapak Inkarnedi & Almh. Ibu Erliwati S.pd
                    </p>
                    <div class="social-links">
                        <a href="https://instagram.com/indahprmta____" target="_blank">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Profil Mempelai Pria -->
    <section id="profil-pria" class="profile-section">
        <div class="profile-bg-slideshow" id="slideshow-pria">
            <div class="profile-bg-slide active" style="background-image: url(<?= base_url('assets/images/bajuadat-gery.jpg') ?>)"></div>
        </div>
        <div class="profile-overlay"></div>
        <div class="profile-content" data-aos="zoom-in-up" data-aos-delay="100" data-aos-duration="2000">
            <div class="profile-card">
                <div class="minang-border" style="pointer-events: none;"></div>
                <svg class="minang-ornament-svg top-left" viewBox="0 0 100 100">
                    <use href="#minang-corner"/>
                </svg>
                <svg class="minang-ornament-svg top-right" viewBox="0 0 100 100">
                    <use href="#minang-corner"/>
                </svg>
                <svg class="minang-ornament-svg bottom-left" viewBox="0 0 100 100">
                    <use href="#minang-corner"/>
                </svg>
                <svg class="minang-ornament-svg bottom-right" viewBox="0 0 100 100">
                    <use href="#minang-corner"/>
                </svg>
                <div class="profile-image-wrapper">
                    <div class="profile-image">
                        <img src="<?= base_url('assets/images/bajuadat-gery.jpg') ?>" alt="Geri">
                    </div>
                </div>
                <div class="profile-text">
                    <h3 class="serif">Gery Anuggrah S.SOS</h3>
                    <p class="gold-light">Putra dari</p>
                    <p class="parents-name">
                        Bapak Sabari S.P & Ibu Nailisada
                    </p>
                    <div class="social-links">
                        <a href="https://instagram.com/gery.anuggrahh" target="_blank">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Background yg akan tampil di semua section -->
    <div class="section-bg"></div>
    <!-- Section 3: Our Story -->
    <section id="story" class="container py-5 position-relative">
        <!-- Ornamen Klasik -->
        <div class="classic-ornament top-left"></div>
        <div class="classic-ornament top-right"></div>
        <div class="classic-ornament bottom-left"></div>
        <div class="classic-ornament bottom-right"></div>
        
        <div class="story-container">
            <h2 class="story-title serif text-center" data-aos="fade-down" data-aos-duration="1000">
                <span class="title-decoration">❦</span>
                Our Story
                <span class="title-decoration">❦</span>
            </h2>
            
            <div class="timeline-classic">
                <!-- Timeline Item 1 -->
                <div class="timeline-item-classic">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content-wrapper" data-aos="fade-right" data-aos-duration="1500">
                        <div class="timeline-date">
                            <span class="date-text">Januari 2018</span>
                        </div>
                        <div class="timeline-content">
                            <div class="content-inner">
                                <div class="timeline-image">
                                    <img src="<?= base_url('assets/images/kasual-01.jpg'); ?>" alt="First Meet" class="story-img">
                                    <div class="image-frame"></div>
                                </div>
                                <div class="timeline-text">
                                    <h3 class="gold serif">Awal Pertemuan</h3>
                                    <p>Di tengah kesibukan perkuliahan, takdir mempertemukan kami melalui sebuah kesalahan kecil. Sebuah grup jurusan yang tertukar membawa kami pada obrolan pertama yang penuh makna. Tuhan memang memiliki cara yang indah untuk mempertemukan dua hati.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timeline Item 2 -->
                <div class="timeline-item-classic">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content-wrapper" data-aos="fade-left" data-aos-duration="1500">
                        <div class="timeline-date">
                            <span class="date-text">26 Oktober 2018</span>
                        </div>
                        <div class="timeline-content">
                            <div class="content-inner">
                                <div class="timeline-image">
                                    <img src="<?= base_url('assets/images/kasual-07.jpg'); ?>" alt="Dating" class="story-img">
                                    <div class="image-frame"></div>
                                </div>
                                <div class="timeline-text">
                                    <h3 class="gold serif">Menjalin Kasih</h3>
                                    <p>Setelah beberapa bulan saling mengenal, kami memutuskan untuk mengikat hati dalam sebuah komitmen. Hari itu menjadi awal dari perjalanan cinta kami yang penuh dengan pembelajaran dan ketulusan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timeline Item 3 -->
                <div class="timeline-item-classic">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content-wrapper" data-aos="fade-right" data-aos-duration="1500">
                        <div class="timeline-date">
                            <span class="date-text">16 Maret 2025</span>
                        </div>
                        <div class="timeline-content">
                            <div class="content-inner">
                                <div class="timeline-image">
                                    <img src="<?= base_url('assets/images/kasual-02.jpg'); ?>" alt="Engagement" class="story-img">
                                    <div class="image-frame"></div>
                                </div>
                                <div class="timeline-text">
                                    <h3 class="gold serif">Pertunangan</h3>
                                    <p>Setelah menjalani hubungan selama kurang lebih 7 tahun, kami memantapkan hati untuk melangkah ke jenjang yang lebih serius. Dengan restu kedua keluarga, kami mengikat janji dalam sebuah pertunangan yang penuh makna.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timeline Item 4 -->
                <div class="timeline-item-classic">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content-wrapper" data-aos="fade-left" data-aos-duration="1500">
                        <div class="timeline-date">
                            <span class="date-text">26 Juni 2025</span>
                        </div>
                        <div class="timeline-content">
                            <div class="content-inner">
                                <div class="special-timeline-image">
                                    <img src="<?= base_url('assets/images/bajuadat-indahgery-00.jpg'); ?>" alt="Wedding" class="full-height-image">
                                    <div class="image-frame"></div>
                                </div>
                                <div class="timeline-text">
                                    <h3 class="gold serif">Menuju Pernikahan</h3>
                                    <p>Dan kini, dengan penuh rasa syukur dan bahagia, kami siap melangkah ke jenjang pernikahan. Semoga Allah SWT senantiasa memberkahi dan meridhoi perjalanan kami dalam membangun mahligai rumah tangga yang sakinah, mawaddah, warahmah.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tambahan Quote dengan Desain Klasik -->
            <div class="quote-wrapper text-center" data-aos="fade-up" data-aos-duration="1500">
                <div class="quote-classic">
                    <div class="quote-ornament top"></div>
                    <p class="quote-text">
                        "Dan di antara tanda-tanda kebesaran-Nya ialah
                        Dia menciptakan pasangan-pasangan untukmu
                        dari jenismu sendiri,
                        agar kamu cenderung dan merasa tenteram kepadanya,
                        dan Dia menjadikan di antaramu
                        rasa kasih dan sayang."
                    </p>
                    <p class="quote-source">
                        (QS. Ar-Rum: 21)
                    </p>
                    <div class="quote-ornament bottom"></div>
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
