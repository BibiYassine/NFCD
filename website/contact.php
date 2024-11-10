<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact-NFCD</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="libraries/aos.css">
    
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
        <section class="contact-section">
            <div class="contact-info">
                <h1 data-aos="fade-up">Contactgegevens</h1>
                <p data-aos="fade-up"><strong>Locatie:</strong> Regio Mechelen</p>
                <p data-aos="fade-up"><strong>Email:</strong> <a href="mailto:needforcardetailing@gmail.com">needforcardetailing@gmail.com</a></p>
            </div>

            <div class="map-container" data-aos="fade-up">
                <h2 data-aos="fade-up">Onze Locatie op Google Maps</h2>
                <iframe data-aos="fade-up"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2528.094883573593!2d4.508598215720678!3d51.08345717956607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3a9b947bfeb15%3A0x1549a16980ed2b12!2sMechelsesteenweg%2C%20Sint-Katelijne-Waver!5e0!3m2!1snl!2sbe!4v1697891829735!5m2!1snl!2sbe"
                width="600"
                height="450"
                style="border:0;"
                allowfullscreen=""
                loading="lazy">
            </iframe>
            
            </div>

            <div class="gemeentes" data-aos="fade-up">
                <h3 data-aos="fade-up">Gemeentes in de Regio Mechelen:</h3>
                <ul class="gemeente-list">
                    <li data-aos="fade-up">Sint-Katelijne-Waver</li>
                    <li data-aos="fade-up">Bonheiden</li>
                    <li data-aos="fade-up">Keerbergen</li>
                    <li data-aos="fade-up">Rijmenam</li>
                    <li data-aos="fade-up">Puurs</li>
                    <li data-aos="fade-up">Bornem</li>
                    <li data-aos="fade-up">Willebroek</li>
                    <li data-aos="fade-up">Walem</li>
                    <li data-aos="fade-up">Duffel</li>
                    <li data-aos="fade-up">Zemst</li>
                    <li data-aos="fade-up">Elewijt</li>
                    <li data-aos="fade-up">Hombeek</li>
                    <li data-aos="fade-up">Heffen</li>
                    <li data-aos="fade-up">Leest</li>
                    <li data-aos="fade-up">Muizen</li>
                    <li data-aos="fade-up">Hofstade</li>
                    <li data-aos="fade-up">Wij doen onze services op onze eigen locatie of de locatie die het best past voor u.</li>
                </ul>
            </div>

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
        AOS.init(); // Initialiseer AOS
    </script>
</body>
</html>
