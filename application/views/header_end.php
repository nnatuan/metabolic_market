<style>
/* Critical Preloader Inline Rules to prevent FOUC / stretching */
.page-preloader {
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    width: 100vw !important;
    height: 100vh !important;
    background-color: #061727 !important;
    z-index: 999999 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    opacity: 1;
    visibility: visible;
    transition: opacity 0.4s ease, visibility 0.4s ease;
}
.page-preloader.loaded {
    opacity: 0 !important;
    visibility: hidden !important;
    pointer-events: none !important;
}
.preloader-logo {
    width: 80px !important;
    height: 80px !important;
    max-width: 80px !important;
    max-height: 80px !important;
    object-fit: contain !important;
    display: block !important;
    margin: 0 auto !important;
}
</style>
</head>
<body>
    <!-- Page Preloader -->
    <div id="page-preloader" class="page-preloader">
        <div class="preloader-content">
            <div class="preloader-logo-container">
                <div class="preloader-glow"></div>
                <div class="preloader-spinner-ring-2"></div>
                <div class="preloader-spinner-ring"></div>
                <img src="<?php echo base_url(); ?>images/logo.png" alt="Loading..." class="preloader-logo">
            </div>
            <div class="preloader-progress-bar"></div>
        </div>
    </div>

    <!-- Preloader Auto-dismiss Script -->
    <script>
    (function() {
        function hidePreloader() {
            var pl = document.getElementById('page-preloader');
            if (pl && !pl.classList.contains('loaded')) {
                pl.classList.add('loaded');
                setTimeout(function() {
                    if (pl && pl.parentNode) {
                        pl.style.display = 'none';
                    }
                }, 450);
            }
        }
        window.addEventListener('load', function() {
            setTimeout(hidePreloader, 250);
        });
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(hidePreloader, 600);
        });
        // Hard fallback: never stay visible longer than 1.2s
        setTimeout(hidePreloader, 1200);
    })();
    </script>
