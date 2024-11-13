<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NFCD</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="libraries/aos.css">
    <link rel="stylesheet" href="over.css"> <!-- Link CSS here -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

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
            <div class="flip-container" onclick="flipImage()">
                <div class="flipper">
                    <img src="images/logo.png" alt="NFCD Detail Service Front" class="about-image front-image">
                    <img src="images/achterkant.png" alt="NFCD Detail Service Back" class="about-image back-image">
                </div>
              
            </div>
            <div class="text-content" data-aos="fade-up">
                <h1>NFCD?</h1>
                <p data-aos="fade-up">
                    Bij NFCD streven we naar de hoogste kwaliteit in dieptereiniging en detailing van uw voertuig. Onze detailers gebruiken geavanceerde technieken en hoogwaardige producten om elk detail grondig te reinigen en uw auto in topconditie te houden. Ons doel is om de perfecte afwerking te leveren, waarbij we elk voertuig met zorg en aandacht behandelen, zodat u de kunst van dieptereiniging en detailing kunt ervaren zoals nooit tevoren.
                </p>
            </div>
        </div>
    </section>
    
</main>



<script src="libraries/aos.js"></script>
<script src="over.js"></script>

</body>
</html>
