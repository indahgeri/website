// Closing section slideshow
(function() {
    const slides = document.querySelectorAll('.closing-slide');
    let idx = 0;
    setInterval(() => {
        slides[idx].classList.remove('active');
        idx = (idx + 1) % slides.length;
        slides[idx].classList.add('active');
    }, 5200);
})();