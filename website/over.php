<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NFCD</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="libraries/aos.css">
    <link rel="stylesheet" href="css/over.css">
    <!-- <link rel="stylesheet" href="contact.css"> Link CSS here -->
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
    $query = "UPDATE page_viewcount SET viewcount_about = viewcount_about + 1 WHERE id = 1";
    $mysqli->query($query);

    $mysqli->close();
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
            <br>
            <div class="text-content" data-aos="fade-up">
                <div class="inleiding">
                <h1>Waarom NFCD?</h1>
                <p data-aos="fade-up">
                    Bij NFCD streven we naar de hoogste kwaliteit in dieptereiniging en detailing van uw voertuig. Onze detailers gebruiken geavanceerde technieken en hoogwaardige producten om elk detail grondig te reinigen en uw auto in topconditie te houden. Ons doel is om de perfecte afwerking te leveren, waarbij we elk voertuig met zorg en aandacht behandelen, zodat u de kunst van dieptereiniging en detailing kunt ervaren zoals nooit tevoren.
                </p>
            </div>
            <br>
            <div class="inleiding" data aos="fade-up">
            <h1>Wat maakt ons anders</h1>
            <p data aos="fade-up">Bij elke reinigingsbeurt streven wij ernaar om onze klanten de hoogste tevredenheid te bieden. We bestrijden grondig bacteriën bij elk pakket en maken gebruik van een stoomreiniger om deze effectief te verwijderen, zelfs bij de laagste reinigingsopties. Twijfelt u over welk pakket het beste voor uw voertuig is? Geen zorgen! Ons team staat klaar om samen met u te bepalen wat uw wagen nodig heeft. Wij nemen altijd de tijd om elk detail zorgvuldig te reinigen en zijn volledig transparant: mocht er iets zijn dat we niet kunnen verwijderen, dan informeren wij u daar eerlijk over.</p>
            </div>
        </div>
    </section>
    </main>
    <?php
        include 'functies/footer.php';
    ?>

    


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
<script src="over.js"></script>

</body>
</html>
