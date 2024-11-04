<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services-NFCD</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="services.css">
    <link rel="stylesheet" href="libraries/aos.css">
    
</head>
<body data-aos="fade-up">

<?php
    include 'connect.php';
    session_start();
    include 'functies/sideMenu.php';
?>

<main>
    <section class="services-section">
        <h1 data-aos="fade-up">Onze Pakketten</h1>

        <div class="services-container" data-aos="fade-up">
            <div class="service-item" data-aos="fade-up">
                <div class="slider">
                    <img src="images/pakket1.png" alt="Classic Pakket 1" class="slider-image">
                    <img src="images/pakket12.png" alt="Classic Pakket 2" class="slider-image">
                </div>
                <h3>Classic - €30</h3>
                <p data-aos="fade-up">- Stofzuigen matten, vloer, zetels.</p>
                <p data-aos="fade-up">- Ruiten reinigen.</p>
                <p data-aos="fade-up">- Afstoffen.</p>
                <p data-aos="fade-up">- Dashboard, deurpanelen en stuur behandelen met stoomreiniger.</p>
                <p data-aos="fade-up">- Buitenkant wassen.</p>
                <p data-aos="fade-up">- Duur: 30 minuten.</p>
                <a href="boeken" class="book-button">Boek nu</a> <!-- Button added here -->
            </div>

            <div class="service-item" data-aos="fade-up">
                <div class="slider">
                    <img src="images/pakket2.png" alt="Refresh Pakket 1" class="slider-image">
                    <img src="images/pakket22.png" alt="Refresh Pakket 2" class="slider-image">
                </div>
                <h3 data-aos="fade-up">Refresh - €80</h3>
                <p data-aos="fade-up">- Dieptereinigen van stoelen, matten, vloer.</p>
                <p data-aos="fade-up">- Ruiten reinigen.</p>
                <p data-aos="fade-up">- Afstoffen.</p>
                <p data-aos="fade-up">- Dashboard, deurpanelen en stuur reinigen en met stoomreiniger behandelen.</p>
                <p data-aos="fade-up">- Duur: 3 uur.</p>
                <a href="boeken" class="book-button">Boek nu</a> <!-- Button added here -->
            </div>

            <div class="service-item" data-aos="fade-up">
                <div class="slider">
                    <img src="images/pakket3.png" alt="Diamond Pakket 1" class="slider-image">
                    <img src="images/luxere.png" alt="Diamond Pakket 2" class="slider-image">
                </div>
                <h3 data-aos="fade-up">Diamond - €130</h3>
                <p data-aos="fade-up">- Dieptereinigen van stoelen, matten, vloer.</p>
                <p data-aos="fade-up">- Ruiten reinigen.</p>
                <p data-aos="fade-up">- Afstoffen.</p>
                <p data-aos="fade-up">- Dashboard, deurpanelen en stuur reinigen en met stoomreiniger behandelen.</p>
                <p data-aos="fade-up">- Buitenkant wassen.</p>
                <p data-aos="fade-up">- Wielen en velgen behandelen.</p>
                <p data-aos="fade-up">- Motorruimte reinigen.</p>
                <p data-aos="fade-up">- Lakbescherming aanbrengen.</p>
                <p data-aos="fade-up">- Duur: 6 uur.</p>
                <a href="boeken" class="book-button">Boek nu</a> <!-- Button added here -->
            </div>
        </div>
    </section>
</main>

<footer data-aos="fade-up">
    <p>&copy; 2024 NeedForCarDetailing.</p>
    <div class="insta">
        <a href="https://www.instagram.com/needforcardetailing/" target="_blank">
            <img src="images/instalog.png" alt="Instagram Logo" style="width: 30px; height: 30px;">
        </a>
    </div>
</footer>

<script src="services.js"></script>
<script src="libraries/aos.js"></script>
<script>
    AOS.init();

    // JavaScript voor het openen en sluiten van het menu
    function openNav() {
        document.getElementById("sidenav").style.width = "250px"; // Pas de breedte aan naar wens
    }

    function closeNav() {
        document.getElementById("sidenav").style.width = "0";
    }

    // JavaScript voor de slider
    document.addEventListener('DOMContentLoaded', function() {
        const sliders = document.querySelectorAll('.slider');
        sliders.forEach(slider => {
            const images = slider.querySelectorAll('.slider-image');
            let currentIndex = 0;

            function showNextImage() {
                images[currentIndex].style.opacity = 0;
                currentIndex = (currentIndex + 1) % images.length;
                images[currentIndex].style.opacity = 1;
            }

            setInterval(showNextImage, 3000); // Verander afbeelding elke 3 seconden
        });
    });
</script>
</body>
</html>
