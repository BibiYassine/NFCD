<?php
    include 'connect.php';
    session_start();
    if(!isset($_SESSION['type'])){
        $_SESSION['type'] = "gast";
    }
    include 'functies/sideMenu.php';
    include 'functies/functies.php';
    onderhoudsModus();
    // controleerAdmin($mysqli);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services-NFCD</title>
    <link rel="shortcut icon" href="images/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="services.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="scroll.css">
    <link rel="stylesheet" href="sidenav.css">
    <link rel="stylesheet" href="libraries/aos.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    
    
</head>
<body>
<main>
    <section class="services-section">
    <h2 data-aos="fade-up">Onze Pakketten</h2>

    <!-- Classic Pakket -->
    <div class="pakket-container" data-aos="fade-up">
        <div class="pakket-info">
            <h3  data-aos="fade-up">Classic - €30</h3>
            <hr>
            <p  data-aos="fade-up">Een basisreiniging voor zowel interieur als exterieur. Ideaal voor regelmatig onderhoud.<br>In dit pakket wordt uw auto volledig afgestoft. De vloeren, matten en zetels worden gestofzuigd en we reinigen uw deurpanelen en stuur ook, dit aan de hand van een stoomreiniger.</p>
       
            <br>
            <hr>
            <a href="contact#cont-form" class="book-button" data aos="fade-up">Afspraak maken</a>
        </div>
        <div class="pakket-media">
            <img src="images/classicskoda.png" alt="Classic Pakket" onclick="openLightbox('classic')"  data-aos="fade-up">
            
        </div>
    </div>

    <!-- Refresh Pakket -->
    <div class="pakket-container" data-aos="fade-up">
        <div class="pakket-info">
            <h3  data-aos="fade-up">Refresh - €85</h3>
            <hr>
            <p  data-aos="fade-up">Een grondige reiniging van het interieur.<br>In dit pakket dieptereinigen we uw stoelen, matten en als het nodig is uw vloer. We desinfecteren ook het gehele interieur met een stoomreiniger. We zijn ook in staat om alcantara stoelen en lederen stoelen te reinigen, we kunnen ook lederen stoelen verzorgen, en een beschermlaagje op brengen tegen vuil, verkleuring en scheuren. Uw deurpanelen, dashboard en stuurtje worden ook gereinigd.</p>
            <br>
            <hr>
            <a href="contact#cont-form" class="book-button" data aos="fade-up">Afspraak maken</a>
        </div>
        <div class="pakket-media">
            <video controls src="images/stuur.mp4" autoplay muted loop type="video/mp4" onclick="openLightbox('refresh')"  data-aos="fade-up">
                Je browser ondersteunt geen video.
            </video>
         
        </div>
    </div>

    <!-- Diamond Pakket -->
    <div class="pakket-container" data-aos="fade-up">
        <div class="pakket-info"  data-aos="fade-up">
            <h3 data-aos="fade-up">Diamond - €130</h3>
            <hr>
            <p  data-aos="fade-up">Onze meest uitgebreide detailing-pakket waarbij wij het gehele interieru en exterieur reinigen.<br>In dit pakket dieptereinigen we uw stoelen, matten en als het nodig is uw vloer. We desinfecteren ook het gehele interieur met een stoomreiniger. We zijn ook in staat om alcantara stoelen en lederen stoelen te reinigen, we kunnen ook lederen stoelen verzorgen en een beschermlaagje op brengen tegen vuil, verkleuring en scheuren. Uw deurpanelen, dashboard en stuurtje worden ook gereinigd.<br>We reinigen ook het exterieur. In tegenstelling tot ons Classic pakket behandelen we alles van het exterieur zoals velgen, motorkap, etc. </p>
            <br>
            <hr>
            <a href="contact#cont-form" class="book-button" data aos="fade-up">Afspraak maken</a> 
        </div>
        <div class="pakket-media">
            <video controls src="images/deep.mp4" autoplay muted loop type="video/mp4" onclick="openLightbox('diamond')"  data-aos="fade-up">
                Je browser ondersteunt geen video.
            </video>
         
        </div>
    </div>

    <div class="pakket-container" data-aos="fade-up">
        <div class="pakket-info"  data-aos="fade-up">
            <h3 data-aos="fade-up">Extras</h3>
            <hr>
            <p  data-aos="fade-up">Motor ruimte reinigen: + €20<br>Afstanden > 25km: + €15<br></p>
            <hr>
            <h4>Duur van services: </h4>
       
            <p>Classic: +- 30 minuten<br>Refresh: +- 3 werkuren <br>Diamond: +- 6 werkuren</p> 
        
        </div>
        <div class="pakket-media">
            <img src="images/motorkap1.png" alt="Classic Pakket" onclick="openLightbox('extra')"  data-aos="fade-up">
        </div>
    </div>
</section>

<!-- Lightbox -->
<div id="lightbox" class="lightbox">
    <span class="close-lightbox" onclick="closeLightbox()">&times;</span>
    <span class="prev" onclick="changeImage(-1)">&#10094;</span>
    <span class="next" onclick="changeImage(1)">&#10095;</span>
    <div class="lightbox-content">
        <img id="lightbox-img" src="">
    </div>
</div>




<?php
    include 'functies/footer.php';
?>

</main>
<script src="services.js"></script>
<script src="libraries/aos.js"></script>
<script>
     function openNav() {
            document.getElementById("sidenav").style.width = "250px"; 
        }

        function closeNav() {
            document.getElementById("sidenav").style.width = "0"; 
        }

        AOS.init(); // Initialize animation library
</script>
</body>
</html>
