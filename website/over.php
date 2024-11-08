<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NFCD</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="libraries/aos.css">
    <link rel="stylesheet" href="over.css"> <!-- Koppel de CSS hier -->
    
</head>
<body>
<?php
    include 'connect.php';
    session_start();
    include 'functies/sideMenu.php';
    include 'functies/functies.php';
    onderhoudsModus();
?>
<main>
    <section class="about-section">
        <div class="about-content">
            <img src="images/logo.png" alt="NFCD Detail Service" class="about-image">
            <div class="text-content" data-aos="fade-up">
                <h1>NFCD?</h1>
                <p data-aos="fade-up">Bij NFCD streven we naar de hoogste kwaliteit in dieptereiniging en detailing van uw voertuig. Onze detailers gebruiken geavanceerde technieken en hoogwaardige producten om elk detail grondig te reinigen en uw auto in topconditie te houden. Ons doel is om de perfecte afwerking te leveren, waarbij we elk voertuig met zorg en aandacht behandelen, zodat u de kunst van dieptereiniging en detailing kunt ervaren zoals nooit tevoren.</p>
            </div>
        </div>
    </section>
</main>

<footer data-aos="fade-up">
    <p>&copy; 2024 NeedForCarDetailing.</p>
    <br>
    <div class="insta">
        <a href="https://www.instagram.com/needforcardetailing/" target="_blank">
            <img src="images/instalog.png" alt="Instagram Logo" style="width: 30px; height: 30px;">
        </a>
    </div>
</footer>

<script src="libraries/aos.js"></script>
<script>
    // JavaScript voor hamburger menu
    function openNav() {
        document.getElementById("sidenav").style.width = "250px"; // Stel de breedte in voor het zijmenu
    }

    function closeNav() {
        document.getElementById("sidenav").style.width = "0"; // Herstel de breedte naar 0 om het zijmenu te verbergen
    }

    // Initialiseer AOS (Animate On Scroll Library)
    AOS.init();
</script>
</body>
</html>
