<?php
session_start();
include 'connect.php';
include 'functies/sideMenu.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boeken </title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="boeken.css">
</head>
<body>
    

<br>
<br>
<br>
<div class="contact-form" data-aos="fade-up">
    <h2 data-aos="fade-up">Boek hier je afspraak</h2>
    <form action="mailto:needforcardetailing@gmail.com" method="post" enctype="text/plain">
        <label for="name" data-aos="fade-up">Naam:</label>
        <input type="text" id="name" name="name" required>

        <label for="email" data-aos="fade-up">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message" data-aos="fade-up">Bericht:</label>
        <textarea id="message" name="message" rows="5" required placeholder="Dag: Tijdstip: Service: Locatie:"></textarea>

        <button type="submit" data-aos="fade-up">Verstuur</button>
    </form>
</div>


        </section>
    </main>

   
    <script src="libraries/aos.js"></script>
<script>
    function openNav() {
        document.getElementById("sidenav").style.width = "250px"; // Open de sidenav
    }

    function closeNav() {
        document.getElementById("sidenav").style.width = "0"; // Sluit de sidenav
    }

    AOS.init();
</script>
</body>
</html>