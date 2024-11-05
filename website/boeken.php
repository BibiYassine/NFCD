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
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="boeken.css">
</head>
<body>
    
<h1>Boek hier een afspraak</h1>



<div class="contact-form" data-aos="fade-up">
                <h2 data-aos="fade-up">Stuur ons een bericht</h2>
                <form action="mailto:needforcardetailing@gmail.com" method="post" enctype="text/plain">
                    <label for="name" data-aos="fade-up">Naam:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email" data-aos="fade-up">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="message" data-aos="fade-up">Bericht:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>

                    <button type="submit" data-aos="fade-up">Verstuur</button>
                </form>
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