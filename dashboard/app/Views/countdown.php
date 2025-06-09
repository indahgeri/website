<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deadline</title>
    <?php echo link_tag('favicon.ico', 'shortcut icon', 'image/ico'); ?>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- AOS Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
     <style>
        :root {
            --dl-color: #dc3545;    /* merah urgent */
            --dl-bg:rgb(196, 203, 209);       /* abu-abu terang */
        }
        body {
            background-color:rgb(173, 171, 171); /* light gray background */
        }
        .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 2.5rem;
            color: var(--dl-color);
            margin-bottom: 1.5rem;
        }
        .countdown-item {
            background: var(--dl-bg);
            border-left: 4px solid var(--dl-color);
            padding: 15px;
            border-radius: 8px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .countdown-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .countdown-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--dl-color);
        }
        .countdown-label {
            font-size: 0.9rem;
            color: #343a40;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>
    <!-- Countdown Section -->
    <section id="deadline" class="py-5">
        <div class="container">
            <h2 class="text-center section-title" data-aos="fade-up">Deadline Pekerjaan</h2>
            <div class="text-center mb-4">
            <p class="lead text-muted">Countdown:</p>
            <!-- Tanggal hard-code, nanti akan di-update lewat JS -->
            <h4 class="text-gold">10 Juni 2025, 17:00 WIB</h4>
            </div>
            <div class="row text-center g-3">
            <div class="col-6 col-md-3">
                <div class="countdown-item">
                <div class="countdown-number" id="days">00</div>
                <div class="countdown-label">Hari</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="countdown-item">
                <div class="countdown-number" id="hours">00</div>
                <div class="countdown-label">Jam</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="countdown-item">
                <div class="countdown-number" id="minutes">00</div>
                <div class="countdown-label">Menit</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="countdown-item">
                <div class="countdown-number" id="seconds">00</div>
                <div class="countdown-label">Detik</div>
                </div>
            </div>
            </div>

            <!-- 4) Progress bar opsional -->
            <div class="mt-4">
            <div class="progress" style="height: 8px;">
                <div id="progress-bar" class="progress-bar bg-danger" role="progressbar" style="width: 0%"></div>
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
        document.addEventListener('DOMContentLoaded', () => {
            const deadline      = new Date('2025-06-09T17:00:00+07:00').getTime();
            const startTime     = new Date('2025-06-09T10:00:00+07:00').getTime();
            // const startTime     = Date.now();

            // Set text-gold value sesuai deadline
            const textGold = document.querySelector('.text-gold');
            if (textGold) {
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', hour12: false, timeZone: 'Asia/Jakarta' };
                let formattedDate = new Date(deadline).toLocaleString('id-ID', options).replace('.', ':');
                // Capitalize first letter of weekday
                formattedDate = formattedDate.charAt(0).toUpperCase() + formattedDate.slice(1);
                textGold.textContent = formattedDate + ' WIB';
            }

            function updateCountdown() {
                const now      = Date.now();
                const dist     = deadline - now;
                if (dist <= 0) {
                    ['days','hours','minutes','seconds'].forEach(id => 
                    document.getElementById(id).textContent = '00'
                    );
                    clearInterval(interval);
                    return;
                }
                const days    = Math.floor(dist / (1000*60*60*24));
                const hours   = Math.floor((dist % (1000*60*60*24)) / (1000*60*60));
                const minutes = Math.floor((dist % (1000*60*60)) / (1000*60));
                const seconds = Math.floor((dist % (1000*60)) / 1000);
                document.getElementById('days').textContent    = String(days).padStart(2,'0');
                document.getElementById('hours').textContent   = String(hours).padStart(2,'0');
                document.getElementById('minutes').textContent = String(minutes).padStart(2,'0');
                document.getElementById('seconds').textContent = String(seconds).padStart(2,'0');

                // Update progress bar (opsional)
                const total = deadline - startTime;
                const passed = now - startTime;
                const pct = Math.min(100, Math.max(0, (passed/total)*100));
                document.getElementById('progress-bar').style.width = pct + '%';
            }

            updateCountdown();
            const interval = setInterval(updateCountdown, 1000);
        });
        </script>
</body>
</html>
