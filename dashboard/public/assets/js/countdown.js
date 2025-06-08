// Set the date we're counting down to (26 Juni 2025)
const countDownDate = new Date("Jun 26, 2025 08:00:00").getTime();

// Update the count down every 1 second
const countdownTimer = setInterval(function() {
    // Get today's date and time
    const now = new Date().getTime();

    // Find the distance between now and the count down date
    const distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Add leading zeros
    const formatNumber = (number) => number < 10 ? `0${number}` : number;

    // Update each element
    document.getElementById('days').textContent = formatNumber(days);
    document.getElementById('hours').textContent = formatNumber(hours);
    document.getElementById('minutes').textContent = formatNumber(minutes);
    document.getElementById('seconds').textContent = formatNumber(seconds);

    // If the count down is finished, display expired message
    if (distance < 0) {
        clearInterval(countdownTimer);
        ['days', 'hours', 'minutes', 'seconds'].forEach(id => {
            document.getElementById(id).textContent = "00";
        });
    }
}, 1000);