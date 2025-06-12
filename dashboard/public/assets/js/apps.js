document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi elemen
    const backToTopButton = document.getElementById('backToTop');
    const autoScrollControl = document.getElementById('autoScrollControl');
    const musicButton = document.getElementById('musicButton');
    const bgMusic = document.getElementById('bgMusic');
    
    // Variabel kontrol scroll
    let touchStartY = 0;
    let touchEndY = 0;
    let isScrolling = false;
    let isAutoScrolling = false;
    let scrollTimeout;
    let autoScrollInterval;
    const SCROLL_STEP = 1;
    const SCROLL_INTERVAL = 20;

    // Variabel kontrol musik
    let isMusicPlaying = false;

    // Fungsi untuk mengontrol musik
    function toggleMusic(e) {
        e && e.stopPropagation(); // Mencegah event bubble
        
        if (bgMusic.paused) {
            bgMusic.play().then(() => {
                isMusicPlaying = true;
                musicButton.classList.add('playing');
            }).catch(err => {
                console.log("Autoplay gagal:", err);
            });
        } else {
            bgMusic.pause();
            isMusicPlaying = false;
            musicButton.classList.remove('playing');
        }
    }

    // Event listener untuk musik
    musicButton.addEventListener('click', toggleMusic);
    musicButton.addEventListener('touchend', (e) => {
        e.preventDefault();
        toggleMusic(e);
    }, { passive: false });

    // Fungsi untuk scroll ke atas
    function scrollToTop() {
        if (isScrolling) return;
        isScrolling = true;
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
        setTimeout(() => {
            isScrolling = false;
        }, 1000);
    }

    // Fungsi untuk auto scroll
    function startAutoScroll() {
        if (!isAutoScrolling) {
            isAutoScrolling = true;
            autoScrollControl.innerHTML = '<i class="bi bi-pause-circle"></i>';
            
            let lastTime = performance.now();
            let scrollDistance = 0;

            autoScrollInterval = setInterval(() => {
                const currentTime = performance.now();
                const deltaTime = currentTime - lastTime;
                lastTime = currentTime;

                const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
                const currentScroll = window.pageYOffset;

                if (currentScroll >= maxScroll) {
                    stopAutoScroll();
                    return;
                }

                scrollDistance += SCROLL_STEP * (deltaTime / SCROLL_INTERVAL);
                if (scrollDistance >= 1) {
                    const scrollAmount = Math.floor(scrollDistance);
                    window.scrollBy({
                        top: scrollAmount,
                        behavior: 'auto'
                    });
                    scrollDistance -= scrollAmount;
                }
            }, SCROLL_INTERVAL);
        }
    }

    function stopAutoScroll() {
        if (isAutoScrolling) {
            isAutoScrolling = false;
            autoScrollControl.innerHTML = '<i class="bi bi-play-circle"></i>';
            clearInterval(autoScrollInterval);
        }
    }

    // Event handlers untuk auto scroll button
    let touchStartTime = 0;
    
    autoScrollControl.addEventListener('touchstart', (e) => {
        e.stopPropagation(); // Mencegah event bubble
        touchStartTime = Date.now();
        e.preventDefault();
    }, { passive: false });

    autoScrollControl.addEventListener('touchend', (e) => {
        e.stopPropagation(); // Mencegah event bubble
        const touchDuration = Date.now() - touchStartTime;
        if (touchDuration < 300) {
            e.preventDefault();
            toggleAutoScroll(e);
        }
    }, { passive: false });

    autoScrollControl.addEventListener('click', function(e) {
        e.stopPropagation(); // Mencegah event bubble
        e.preventDefault();
        toggleAutoScroll(e);
    });

    function toggleAutoScroll(e) {
        e && e.stopPropagation(); // Mencegah event bubble
        
        if (!autoScrollControl.hasAttribute('data-processing')) {
            autoScrollControl.setAttribute('data-processing', 'true');
            
            if (isAutoScrolling) {
                stopAutoScroll();
            } else {
                startAutoScroll();
            }
            
            setTimeout(() => {
                autoScrollControl.removeAttribute('data-processing');
            }, 300);
        }
    }

    // Event handlers untuk back to top button
    backToTopButton.addEventListener('touchstart', (e) => {
        e.stopPropagation(); // Mencegah event bubble
        touchStartY = e.touches[0].clientY;
        e.preventDefault();
    }, { passive: false });

    backToTopButton.addEventListener('touchend', (e) => {
        e.stopPropagation(); // Mencegah event bubble
        touchEndY = e.changedTouches[0].clientY;
        const touchDiff = touchEndY - touchStartY;
        
        if (Math.abs(touchDiff) < 10) {
            scrollToTop();
        }
        e.preventDefault();
    }, { passive: false });

    backToTopButton.addEventListener('click', (e) => {
        e.stopPropagation(); // Mencegah event bubble
        e.preventDefault();
        scrollToTop();
    });

    // Menangani scroll event dengan throttling
    window.addEventListener('scroll', () => {
        if (scrollTimeout) {
            window.cancelAnimationFrame(scrollTimeout);
        }

        scrollTimeout = window.requestAnimationFrame(() => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const footer = document.querySelector('footer');
            const footerTop = footer.offsetTop;
            const scrollPosition = window.scrollY + window.innerHeight;
            const documentHeight = Math.max(
                document.body.scrollHeight,
                document.body.offsetHeight,
                document.documentElement.clientHeight,
                document.documentElement.scrollHeight,
                document.documentElement.offsetHeight
            );
            // Muncul setelah scroll 60% dari tinggi konten
            const scrollThreshold = documentHeight * 0.4;

            // Cek jika cover sudah tidak tampil (sudah section-hidden)
            const coverSection = document.getElementById('cover');
            const coverHidden = coverSection && coverSection.classList.contains('section-hidden');

            // Tampilkan/sembunyikan tombol back-to-top berdasarkan scroll position dan cover
            if (coverHidden && scrollPosition > scrollThreshold) {
                backToTopButton.classList.add('show');
                backToTopButton.style.display = 'flex';
            } else {
                backToTopButton.classList.remove('show');
                backToTopButton.style.display = 'none';
            }

            // Tampilkan auto scroll control setelah undangan dibuka
            if (scrollTop > window.innerHeight * 0.3) {
                autoScrollControl.classList.add('show');
            } else {
                autoScrollControl.classList.remove('show');
            }

            // Sesuaikan posisi tombol saat mendekati footer
            const footerDistance = footerTop - scrollPosition;
            if (footerDistance < 100) {
                const newBottom = Math.abs(footerDistance - 0);
                // backToTopButton.style.bottom = `${newBottom}px`;
                backToTopButton.style.bottom = `25px`;
            } else {
                backToTopButton.style.bottom = 'max(20px, env(safe-area-inset-bottom))';
            }
        });
    }, { passive: true });

    // Refresh AOS on scroll
    let aosRefreshTimeout;
    window.addEventListener('scroll', function() {
        if (aosRefreshTimeout) {
            clearTimeout(aosRefreshTimeout);
        }
        aosRefreshTimeout = setTimeout(function() {
            AOS.refresh();
        }, 60);
    }, { passive: true });

    // Handle page visibility change
    document.addEventListener('visibilitychange', () => {
        if (document.hidden) {
            if (isAutoScrolling) stopAutoScroll();
            if (isScrolling) isScrolling = false;
        }
    });

    // Handle touch events untuk menghentikan auto scroll
    document.addEventListener('touchstart', (e) => {
        // Jangan hentikan auto-scroll jika touch event berasal dari tombol kontrol
        if (e.target.closest('#musicButton') || 
            e.target.closest('#autoScrollControl') || 
            e.target.closest('#backToTop')) {
            return;
        }
        
        if (isAutoScrolling) {
            stopAutoScroll();
        }
    }, { passive: true });

    // --- Hide all sections except cover and footer on load ---
    const coverSection = document.getElementById('cover');
    const bukaUndanganBtn = document.getElementById('bukaUndangan');
    const footer = document.querySelector('footer');
    const allSections = Array.from(document.querySelectorAll('section'));
    const sectionsToHide = allSections.filter(sec => sec !== coverSection);
    // Reset cover section & tombol buka undangan ke kondisi awal
    if (coverSection) {
        coverSection.classList.remove('section-hidden', 'invitation-open');
        coverSection.style.opacity = '';
        coverSection.style.display = '';
    }
    if (bukaUndanganBtn) {
        bukaUndanganBtn.style.display = 'inline-block'; // atau 'flex' sesuai kebutuhan CSS
        bukaUndanganBtn.disabled = false;
    }
    // Hanya tambahkan section-hidden, JANGAN tambahkan ke #save-the-date
    sectionsToHide.forEach(sec => {
        if (sec.id !== 'save-the-date') sec.classList.add('section-hidden');
    });
    if (footer) footer.classList.add('section-hidden');

    // --- Invitation open logic ---
    document.getElementById('bukaUndangan').addEventListener('click', function(e) {
        e.preventDefault();
        musicButton.style.display = 'flex';
        bgMusic.play().then(() => {
            isMusicPlaying = true;
            musicButton.classList.add('playing');
        }).catch(err => {
            console.log("Autoplay gagal:", err);
        });
        autoScrollControl.classList.add('show');
        autoScrollControl.style.display = 'flex';
        // Pastikan tombol back to top tetap disembunyikan
        backToTopButton.classList.remove('show');
        backToTopButton.style.display = 'none';

        // --- Animate cover as invitation open, then hide it ---
        coverSection.classList.add('invitation-open');
        setTimeout(() => {
            coverSection.classList.add('section-hidden');
            coverSection.classList.remove('invitation-open');
            // Tampilkan section lain dan footer dengan fade-in
            sectionsToHide.forEach((sec, idx) => {
                if (sec.id !== 'save-the-date') {
                    setTimeout(() => {
                        sec.classList.remove('section-hidden');
                        sec.classList.add('section-fade-in');
                        setTimeout(() => sec.classList.remove('section-fade-in'), 900);
                    }, idx * 80);
                }
            });
            if (footer) {
                setTimeout(() => {
                    footer.classList.remove('section-hidden');
                    footer.classList.add('section-fade-in');
                    setTimeout(() => footer.classList.remove('section-fade-in'), 900);
                }, sectionsToHide.length * 80 + 200);
            }
            // Scroll ke save-the-date setelah animasi
            setTimeout(() => {
                const saveTheDateSection = document.getElementById('save-the-date');
                // Remove hidden class and prepare animation
                saveTheDateSection.classList.remove('section-hidden');
                saveTheDateSection.style.opacity = '0';
                saveTheDateSection.style.display = 'block';
                
                // Ensure smooth transition
                setTimeout(() => {
                    saveTheDateSection.style.transition = 'opacity 1.5s ease';
                    saveTheDateSection.style.opacity = '1';
                    saveTheDateSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    
                    // Refresh AOS for remaining sections
                    AOS.refresh();
                    
                    // Wait for content to be fully visible before starting auto-scroll
                    const saveTheDateAnimDuration = 2800;
                    setTimeout(() => {
                        // DULU: if (!isAutoScrolling) { toggleAutoScroll(); }
                        // Sekarang: Tidak otomatis menjalankan auto scroll
                        // Hanya refresh AOS saja
                        AOS.refresh();
                    }, saveTheDateAnimDuration);
                }, 100);
            }, 800); // Increased delay for smoother transition
        }, 1100);
    });
});

// Scroll ke atas saat halaman dimuat
window.scrollTo(0, 0);
// Sembunyikan tombol auto scroll & back to top pada load awal
document.addEventListener('DOMContentLoaded', function() {
    const autoScrollControl = document.getElementById('autoScrollControl');
    const backToTopButton = document.getElementById('backToTop');

    if (autoScrollControl) {
        autoScrollControl.classList.remove('show');
        autoScrollControl.style.display = 'none';
    }
    if (backToTopButton) {
        backToTopButton.classList.remove('show');
        backToTopButton.style.display = 'none';
    }
});

// Modal image handler
document.addEventListener('DOMContentLoaded', function() {
    var imageModalEl = document.getElementById('imageModal');
    // Ketika modal akan dibuka…
    imageModalEl.addEventListener('show.bs.modal', function (event) {
      // Elemen yang memicu (gallery-item)
      var trigger = event.relatedTarget;
      // Ambil URL dari attribute data-img
      var imgSrc = trigger.getAttribute('data-img');
      // Masukkan ke tag <img> di dalam modal
      var modalImg = imageModalEl.querySelector('.modal-image-container img');
      modalImg.src = imgSrc;
    });
});

// Handle touch events for better mobile interaction
let touchStartY = 0;
let touchEndY = 0;
let isScrolling = false;

document.addEventListener('touchstart', function(e) {
    touchStartY = e.touches[0].clientY;
}, { passive: true });

document.addEventListener('touchmove', function(e) {
    if (isScrolling) return;
    
    touchEndY = e.touches[0].clientY;
    const deltaY = touchEndY - touchStartY;
    
    // Disable auto-scroll on significant manual scroll
    if (Math.abs(deltaY) > 50) {
        isAutoScrolling = false;
        autoScrollControl.querySelector('i').classList.remove('bi-pause-circle');
        autoScrollControl.querySelector('i').classList.add('bi-play-circle');
    }
}, { passive: true });

document.addEventListener('touchend', function() {
    touchStartY = 0;
    touchEndY = 0;
}, { passive: true });