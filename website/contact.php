<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact-NFCD</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="contact.css">
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

<?php

    include 'connect.php';
    session_start();
    include 'functies/sideMenu.php';
    include 'functies/functies.php';
    onderhoudsModus();
    // controleerAdmin($mysqli);
    ?>

    <main>
        <section class="contact-section">
            <div class="contact-info">
                <h1 data-aos="fade-up">Contactgegevens</h1>
                
            </div>

            <!-- <div class="map-container" data-aos="fade-up">
               
                <iframe data-aos="fade-up"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2528.094883573593!2d4.508598215720678!3d51.08345717956607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3a9b947bfeb15%3A0x1549a16980ed2b12!2sMechelsesteenweg%2C%20Sint-Katelijne-Waver!5e0!3m2!1snl!2sbe!4v1697891829735!5m2!1snl!2sbe"
                width="1000"
                height="500"
                style="border:0;"
                allowfullscreen=""
                loading="lazy">
            </iframe>
            
            </div> -->
            <br>
            <div class= "kaartje">
            <img src="images/voorkant2.png" alt="contact" class="contact-img" data-aos="fade-up">
            <br>
            <br>
            <img src="images/achterkant2.png" alt="contact" class="contact-img" data-aos="fade-up">
        </div>
            <div class="contact-form" id="cont-form"data-aos="fade-up">
           
            <form action="send_mail.php" method="POST" id="contact-form">
        <label for="name">Naam:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">E-mailadres:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Bericht:</label><br>
        <textarea id="message" name="message" rows="5" required placeholder="Vragen, afspraak boeken, etc."></textarea><br><br>

        <button type="submit">Verstuur</button>
    </form>
            </div>
        </section>
   


  
<?php
    include 'functies/footer.php';
?>

</main>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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
