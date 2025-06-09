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

            // Tampilkan/sembunyikan tombol back-to-top berdasarkan scroll position
            if (scrollPosition > scrollThreshold) {
                backToTopButton.classList.add('show');
            } else {
                backToTopButton.classList.remove('show');
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

    // Inisialisasi tampilan tombol
    const initialScroll = window.pageYOffset || document.documentElement.scrollTop;
    if (initialScroll > window.innerHeight * 0.3) {
        backToTopButton.classList.add('show');
        autoScrollControl.classList.add('show');
    }

    // Event untuk membuka undangan
    document.getElementById('bukaUndangan').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('save-the-date').scrollIntoView({ behavior: 'smooth' });
        musicButton.style.display = 'flex';
        
        // Play music saat undangan dibuka
        bgMusic.play().then(() => {
            isMusicPlaying = true;
            musicButton.classList.add('playing');
        }).catch(err => {
            console.log("Autoplay gagal:", err);
        });
        
        // Tampilkan tombol auto scroll
        autoScrollControl.classList.add('show');
        
        // Mulai auto scroll setelah 3 detik
        setTimeout(() => {
            if (!isAutoScrolling) {
                toggleAutoScroll();
            }
        }, 3000);
    });
});

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