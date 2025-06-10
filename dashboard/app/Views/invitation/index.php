<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <title>Undangan Pernikahan Indah & Gery</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('favicon.ico') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('favicon.ico') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('favicon.ico') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('favicon.ico') ?>">

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
    <link href="<?= base_url('assets/css/gallery.css?v='.filemtime(FCPATH.'assets/css/gallery.css')); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/wedding-event.css?v='.filemtime(FCPATH.'assets/css/wedding-event.css')); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/gift.css?v='.filemtime(FCPATH.'assets/css/gift.css')); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/rsvp.css?v='.filemtime(FCPATH.'assets/css/rsvp.css')); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/wishes.css?v='.filemtime(FCPATH.'assets/css/wishes.css')); ?>" rel="stylesheet">
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
                <div class="nama-tamu" data-aos="fade-up" data-aos-duration="3000"><?= ucwords(strtolower($guestName)) ?></div>
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

    <!-- SECTION : WEDDING EVENT
     1.  Ornamen klasik tetap di sini
     2.  Ikon menggunakan Bootstrap Icons
     3.  AOS animasi dipertahankan
    ------------------------------------------------------------>
    <section id="wedding-event" class="container-fluid py-4 position-relative">

        <!-- BACKDROP foto kabur (optional) -->
        <div class="bg-overlay"></div>

        <!-- Heading -->
        <div class="event-heading mx-auto" data-aos="fade-down" data-aos-duration="1000">
            <div class="heading-row d-flex align-items-center">
                <span class="heading-main">Wedding</span>
                <span class="heading-line flex-grow-1"></span>
            </div>
            <span class="heading-sub">Event</span>
        </div>

        <!-- Body / cards -->
        <div class="container">
            <div class="row g-4 justify-content-center">
            <!-- Akad -->
            <div class="col-12 col-md-6 col-lg-5">
                <article class="card event-card h-100 shadow-lg" data-aos="fade-up" data-aos-duration="1500">
                <div class="card-body p-sm-4">
                    <header class="d-flex align-items-center mb-3 gap-2">
                    <i class="bi bi-flower1 event-icon"></i>
                    <h3 class="event-title m-0">Akad Nikah</h3>
                    </header>

                    <ul class="event-details list-unstyled ps-0 mb-0">
                        <li><i class="bi bi-calendar-event me-2 gold"></i>Kamis, 26 Juni 2025</li>
                        <li><i class="bi bi-clock me-2 gold"></i>08.00 WIB – Selesai</li>
                        <li><i class="bi bi-geo-alt me-2 gold"></i>Masjid Nurul Amin Pagaruyung</li>
                    </ul>

                    <a href="https://maps.app.goo.gl/ZudTERZwJmVRTYNKA"
                    class="btn btn-outline-light btn-sm rounded-pill mt-3 w-100"
                    target="_blank" rel="noopener">
                    <i class="bi bi-map"></i> Lihat Lokasi
                    </a>
                </div>
                </article>
            </div>

            <!-- Resepsi -->
            <div class="col-12 col-md-6 col-lg-5">
                <article class="card event-card h-100 shadow-lg" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500">
                <div class="card-body p-sm-4">
                    <header class="d-flex align-items-center mb-3 gap-2">
                    <i class="bi bi-cup-straw event-icon"></i>
                    <h3 class="event-title m-0">Resepsi</h3>
                    </header>

                    <ul class="event-details list-unstyled ps-0 mb-0">
                    <li><i class="bi bi-calendar-event me-2 gold"></i>Kamis, 26 Juni 2025</li>
                    <li><i class="bi bi-clock me-2 gold"></i>10.00 WIB – Selesai</li>
                    <li><i class="bi bi-geo-alt me-2 gold"></i>Komplek Perumahan PIP, Jorong Saruaso Barat, Nagari Saruaso, Kecamatan Tanjung Emas, Kabupaten Tanah Datar</li>
                    </ul>

                    <a href="https://maps.app.goo.gl/1rzpxRxCYmt2DUrQ7"
                    class="btn btn-outline-light btn-sm rounded-pill mt-3 w-100"
                    target="_blank" rel="noopener">
                    <i class="bi bi-map"></i> Lihat Lokasi
                    </a>
                </div>
                </article>
            </div>
            </div>
        </div>
    </section>


    <!-- Background yg akan tampil di semua section -->
    <div class="section-bg"></div>
    <!-- Section 3: Our Story -->
    <section id="story" class="container py-1 position-relative">
        
        <!-- Heading -->
        <div class="story-container">
            <div class="event-heading mx-auto" data-aos="fade-down" data-aos-duration="1000">
                <div class="heading-row d-flex align-items-center">
                    <span class="heading-main">Indah & Gery</span>
                    <span class="heading-line flex-grow-1"></span>
                </div>
                <span class="heading-sub">Story</span>
            </div>
            
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
                                    <p>Setelah menjalani hubungan selama kurang lebih 6 tahun, kami memantapkan hati untuk melangkah ke jenjang yang lebih serius. Dengan restu kedua keluarga, kami mengikat janji dalam sebuah pertunangan yang penuh makna.</p>
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
            <div class="quote-wrapper text-center mt-3" data-aos="fade-up" data-aos-duration="1500">
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

    <!-- Section 4: Galeri -->
    <section id="galeri" class="container py-3">
         <!-- BACKDROP foto kabur (optional) -->
        <!-- <div class="bg-overlay"></div> -->
        <!-- Heading -->
        <div class="event-heading mx-auto" data-aos="fade-down" data-aos-duration="1000">
            <div class="heading-row d-flex align-items-center">
                <span class="heading-main">Gallery</span>
                <span class="heading-line flex-grow-1"></span>
            </div>
            <span class="heading-sub"></span>
        </div>

        <!-- Gallery Grid -->
        <div class="gallery-grid">
            <?php foreach($images as $i => $img): 
                // delay AOS berjenjang
                $delay = 100 + ($i * 100);
                $url   = base_url("assets/images/{$img}").'?v='.filemtime(FCPATH."assets/images/{$img}");
                ?>
                <div
                    class="gallery-item"
                    data-aos="fade"
                    data-aos-duration="1500"
                    data-aos-delay="<?= $delay ?>"
                    data-bs-toggle="modal"
                    data-bs-target="#imageModal"
                    data-img="<?= $url ?>"
                >
                    <img src="<?= $url ?>" alt="Gallery <?= $i+1 ?>" class="img-fluid">
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Modal for Image Preview -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <button type="button" class="modal-close-btn" data-bs-dismiss="modal">
                            <i class="bi bi-x"></i>
                        </button>
                        <div class="modal-image-container">
                            <img src="" class="img-fluid" alt="Gallery Preview">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =============================================
     SECTION : WEDDING GIFT  (Amplop Digital)
    ==============================================-->
    <section id="gift" class="container-fluid py-3 position-relative">
        <!-- <div class="bg-overlay"></div> -->

        <!-- Heading (re-use komponen heading) -->
        <div class="event-heading mx-auto mb-3" data-aos="fade-down">
            <div class="heading-row d-flex align-items-center">
                <span class="heading-main">Wedding Gift</span>
                <span class="heading-line flex-grow-1"></span>
            </div>
            <span class="heading-sub">Tanda kasih untuk pengantin</span>
        </div>

        <p class="gift-lead text-center px-3 py-2 mb-4 rounded-4 shadow-sm position-relative" data-aos="fade-down" data-aos-delay="80">
            <i class="bi bi-gift-fill me-2 gold" style="font-size:1.3em;"></i>
            Kebahagiaan kami sempurna dengan kehadiran, doa, dan restu Anda.<br class="d-none d-md-block"> Namun jika ingin turut berbagi melalui hadiah, silakan gunakan rekening berikut sebagai tanda cinta.
        </p>

        <!-- Cards -->
        <div class="container" style="max-width:760px">
            <div class="row g-4 justify-content-center" data-aos="fade-up" data-aos-delay="150">
            <!-- Indah -->
            <div class="col-12 col-md-6">
                <article class="gift-card glass-card text-center h-100 shadow-lg p-4">
                    <img src="<?= base_url('assets/img/bank-mandiri.png'); ?>" alt="Bank Mandiri"
                        class="bank-logo mb-3" loading="lazy" width="120" height="34">
                    <h4 class="gift-name mb-1">Indah Permata Sari</h4>
                    <p class="gift-bank small mb-3">Bank Mandiri</p>
                    <div class="gift-acc mb-3" data-account="1110020609349">
                        <span class="acc-number">1110&nbsp;0206&nbsp;0934&nbsp;9</span>
                        <button class="btn btn-copy ms-2" aria-label="Salin"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Salin">
                        <i class="bi bi-clipboard"></i>
                        </button>
                    </div>
                    <!-- Optional QR -->
                    <!-- <img src="/assets/img/qr/indah_qr.png" alt="QR Mandiri Indah" loading="lazy"
                        class="qr-img mt-2 rounded" width="140" height="140"> -->
                </article>
            </div>

            <!-- Gery -->
            <div class="col-12 col-md-6">
                <article class="gift-card glass-card text-center h-100 shadow-lg p-4">
                    <img src="<?= base_url('assets/img/bank-mandiri.png'); ?>" alt="Bank Mandiri"
                        class="bank-logo mb-3" loading="lazy" width="120" height="34">
                    <h4 class="gift-name mb-1">Gery Anuggrah</h4>
                    <p class="gift-bank small mb-3">Bank Mandiri</p>
                    <div class="gift-acc mb-3" data-account="1080024249527">
                        <span class="acc-number">1080&nbsp;0242&nbsp;4952&nbsp;7</span>
                        <button class="btn btn-copy ms-2" aria-label="Salin"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Salin">
                        <i class="bi bi-clipboard"></i>
                        </button>
                    </div>
                    <!-- Optional QR -->
                    <!-- <img src="/assets/img/qr/gery_qr.png" alt="QR Mandiri Gery" loading="lazy"
                        class="qr-img mt-2 rounded" width="140" height="140"> -->
                </article>
            </div>
            </div>
        </div>

        <!-- Bootstrap Toast -->
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="copyToast" class="toast align-items-center text-bg-success border-0"
                role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                Nomor rekening disalin!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto"
                        data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            </div>
        </div>
    </section>
    
    
    <!-- ==============================
     SECTION : RSVP
    ==================================-->
    <section id="rsvp" class="container-fluid py-5 position-relative">
        <div class="bg-overlay"></div>

        <!-- Heading (pakai style sama dgn Wedding Event) -->
        <div class="event-heading mx-auto" data-aos="fade-down">
            <div class="heading-row d-flex align-items-center">
            <span class="heading-main">RSVP</span>
            <span class="heading-line flex-grow-1"></span>
            </div>
            <span class="heading-sub">Konfirmasi Kehadiran</span>
        </div>

        <!-- Form -->
        <div class="container py-3" style="max-width:650px">
            <form id="rsvpForm" class="needs-validation glass-card p-4 p-md-5 shadow-lg"
                action="/rsvp/submit" method="POST" novalidate
                data-aos="fade-up" data-aos-delay="150">

                <!-- slug -->
                <input type="hidden" name="slug" value="<?= $slug ?>">
                <!-- Nama Tamu -->
                <div class="mb-3">
                    <label for="guestName" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="guestName" name="name"
                        placeholder="Mis. <?= $guestName ?>" required>
                    <div class="invalid-feedback">Nama wajib diisi.</div>
                </div>

                <!-- Konfirmasi Kehadiran -->
                <fieldset class="mb-3">
                    <legend class="form-label mb-2">Konfirmasi kehadiran, ya 😊</legend>
                    <div class="btn-group w-100" role="group" aria-label="Attendance">
                    <input type="radio" class="btn-check" name="attend" id="attendYes"
                            value="yes" required>
                    <label class="btn btn-outline-light flex-fill" for="attendYes">
                        <i class="bi bi-check-circle me-1"></i> Hadir
                    </label>

                    <input type="radio" class="btn-check" name="attend" id="attendNo"
                            value="no" required>
                    <label class="btn btn-outline-light flex-fill" for="attendNo">
                        <i class="bi bi-x-circle me-1"></i> Tidak hadir
                    </label>
                    </div>
                    <div class="invalid-feedback d-block">Mohon pilih salah satu.</div>
                </fieldset>

                <!-- Jumlah Tamu (muncul hanya jika 'Hadir') -->
                <div class="mb-3 d-none" id="guestCountWrapper">
                    <label for="guestCount" class="form-label">Jumlah orang yang hadir</label>
                    <input type="number" class="form-control" id="guestCount"
                        name="count" min="1" max="5" value="1">
                </div>

                <!-- Pesan / Ucapan -->
                <div class="mb-4">
                    <label for="message" class="form-label">Sampaikan pesan, untaian doa, serta harapan indah untuk kami. </label>
                    <textarea class="form-control" id="message" name="message"
                            rows="3" placeholder="Selamat menempuh hidup baru…"></textarea>
                </div>

                <!-- Tombol Submit -->
                <div class="d-grid">
                    <button class="btn btn-gold rounded-pill py-2" type="submit">
                    <i class="bi bi-envelope-heart me-1"></i> Kirim RSVP
                    </button>
                </div>

                <!-- Pesan sukses (hidden default) -->
                <div class="alert alert-success mt-4 d-none" id="rsvpSuccess">
                    Terima kasih! RSVP Anda sudah tercatat.
                </div>
            </form>
        </div>
    </section>

    <!-- ===========================================
     SECTION : DOA & PESAN
    ==============================================-->
    <section id="wishes" class="container-fluid py-5 position-relative">
        <div class="bg-overlay"></div>

        <!-- Heading (reuse komponen heading) -->
        <div class="event-heading mx-auto" data-aos="fade-down">
            <div class="heading-row d-flex align-items-center">
            <span class="heading-main">Pesan, Doa &amp; Harapan</span>
            <span class="heading-line flex-grow-1"></span>
            </div>
            <span class="heading-sub">Warm wishes for us</span>
        </div>

        <!-- List wrapper -->
        <div class="container" style="max-width:760px">
            <div class="wish-scroll glass-card p-3 p-sm-4 shadow-lg" data-aos="fade-up" data-aos-delay="150">
            <ul id="wishList" class="list-unstyled m-0">
                <!-- Sementara static contoh—akan diisi JS -->
                <li class="wish-card">
                    <div class="wish-header">
                        <span class="wish-avatar">A</span>
                        <div>
                            <h5 class="wish-name">Ayu Widya</h5>
                            <time class="wish-time" datetime="2025-06-12T14:30">12 Jun 2025 14:30</time>
                        </div>
                    </div>
                    <p class="wish-text">Selamat menempuh hidup baru. Semoga langgeng sampai akhir hayat 💖</p>
                </li>
            </ul>
            <!-- Loader animasi -->
            <div id="wishLoader" class="text-center py-3 d-none">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
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
    <script src="<?= base_url('assets/js/apps.js?v='.filemtime(FCPATH.'assets/js/apps.js')); ?>"></script>
    <script src="<?= base_url('assets/js/countdown.js?v='.filemtime(FCPATH.'assets/js/countdown.js')); ?>"></script>
    <script src="<?= base_url('assets/js/gift.js?v='.filemtime(FCPATH.'assets/js/gift.js')); ?>"></script>
    <script src="<?= base_url('assets/js/rsvp.js?v='.filemtime(FCPATH.'assets/js/rsvp.js')); ?>"></script>
    <script src="<?= base_url('assets/js/wishes.js?v='.filemtime(FCPATH.'assets/js/wishes.js')); ?>"></script>
</body>
</html>
