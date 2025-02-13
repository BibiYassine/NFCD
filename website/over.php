<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NFCD</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="libraries/aos.css">
    <link rel="stylesheet" href="over.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="scroll.css"> 
    <link rel="stylesheet" href="sidenav.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
</head>
<body>
<?php
    include 'connect.php';
    session_start();
    include 'functies/sideMenu.php';
    include 'functies/functies.php';
    onderhoudsModus();
    // controleerAdmin($mysqli);
    $query = "UPDATE page_viewcount SET viewcount_about = viewcount_about + 1 WHERE id = 1";
    $mysqli->query($query);
    $mysqli->close();
 
?>

<main>
    <section class="about-section">
        <div class="about-content">

            <!-- Eerste tekstblok met afbeelding -->
            <div class="inleiding">
                <img src="images/logo.png" alt="NFCD Detail Service">
                <div class="text">
                    <h1>Waarom NFCD?</h1>
                    <p>
                        Bij NFCD streven we naar de hoogste kwaliteit in dieptereiniging en detailing van uw voertuig.
                        Onze detailers gebruiken geavanceerde technieken en hoogwaardige producten om elk detail grondig te reinigen en uw auto in topconditie te houden.
                    </p>
                </div>
            </div>

            <!-- Tweede tekstblok met video -->
            <div class="inleiding">
                <div class="text" id="video">
                    <h1>Wat maakt ons anders?</h1>
                    <p>
                        We bestrijden grondig bacteriën bij elk pakket en maken gebruik van een stoomreiniger om deze effectief te verwijderen.
                        Twijfelt u over welk pakket het beste voor uw voertuig is? Geen zorgen! Ons team staat klaar om u te adviseren.
                    </p>
                </div>
                <video src="images/stoom.mp4" autoplay muted loop></video>
            </div>

        </div>
    </section>
    
<?php include 'functies/footer.php'; ?>
</main>


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
