
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-NFCD</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">    
    <link rel="stylesheet" href="libraries/aos.css">
    
</head>
<body>
<?php
         include 'connect.php';
            session_start();
         //initaliseerd de klant variabele zodat er verder geen errors komen voor bezoekers die niet zijn ingelogd.
            if(!isset($_SESSION['type'])){
                $_SESSION['type'] = "gast";
            }
            include 'functies/sideMenu.php';
            include 'functies/functies.php';
            onderhoudsModus();
      ?>



    
    <main>
        <section id="home" class="hero">
            <h1>Welkom op de officiële website van NFCD</h1>
            <p>Needforcardetailing, Het detail bedrijf dat uw wagen nodig heeft.</p>
            <a href="over.php" class="btn">Lees hier meer</a>
        </section>
    

    <div>    
        <section id="faq" class="faq" data-aos="fade-up">
            <h2>Veel Gestelde Vragen (FAQ)</h2>
            <p>Dit zijn de meest gestelde vragen die wij krijgen als detailing bedrijf.</p>
            <div class="faq-container">
                <div class="faq-item" data-aos="fade-up">
                    <img src="images/faq1.png" alt="Icon 1">
                    <h3>Waarom detailen en geen carwash?</h3>
                    <p>Detailen heeft tal van voordelen. Geen was krassen, tot in de kleinste details gereinigd, je auto naar een showroom staat en dat allemaal aangevuld met interieur en lak bescherming.</p>
                </div>
                <div class="faq-item" data-aos="fade-up">
                    <img src="images/faq2.png" alt="Icon 2">
                    <h3>Hoe lang duurt een beurt?</h3>
                    <p>Dit is variërend van het gekozen pakket, een basis buiten/binnen reiniging duurt gemiddeld 3 werkuren om een idee te geven.</p>
                </div>
                <div class="faq-item" data-aos="fade-up">
                    <img src="images/faq3.png" alt="Icon 3">
                    <h3>Hoe vaak een detailing beurt?</h3>
                    <p>Wij raden aan om 1-2x per jaar een dieptereiniging van het interieur te laten doen. Een handwas of een basis binnen/buiten reiniging is elke maand nodig!</p>
                </div>
            </div>
        </section>
    </div>
        <section id="services" class="services">
            <h2>Wat bieden we aan?</h2>
            <p>Hieronder vindt u een overzicht van onze diensten:</p>
            <br>
            <a href="services.php" class="book-button">Boek nu</a>
            <div class="services-container" data-aos="fade-up">
            <div class="service-item" data-aos="fade-up">
                    <img src="images/luxere.png" alt="Alcantara Cleaning">
                    <h3 data-aos="fade-up">Alcantara Cleaning</h3>
                    <p data-aos="fade-up">Specialistische reiniging voor Alcantara stoffen.</p>
                </div>
                <div class="service-item">
                <img src="images/pakket22.png" alt="Dieptereiniging">
                    <h3 data-aos="fade-up">Dieptereiniging</h3>
                    <p data-aos="fade-up">Een grondige reiniging van uw voertuig, van binnen en buiten.</p>
                </div>
                <div class="service-item" data-aos="fade-up">
                    <img src="images/leder.png" alt="Leder Cleaning">
                    <h3 data-aos="fade-up">Leder Cleaning</h3>
                    <p data-aos="fade-up">Professionele reiniging en onderhoud van lederen bekleding.</p>
                </div>
                <div class="service-item" data-aos="fade-up">
                    <img src="images/pakket12.png" alt="Interieur Reiniging">
                    <h3 data-aos="fade-up">Interieur Reiniging</h3>
                    <p data-aos="fade-up" >Grondige reiniging van het interieur van uw auto.</p>
                </div>
            </div>
        </section>

        <section id="car-types" class="car-types">
            <h2 data-aos="fade-up">Welke types auto's doen we?</h2>
            <p data-aos="fade-up">Wij bieden detailing aan voor verschillende soorten auto's:</p>
            <div class="car-types-container">
                <div class="car-type-item" data-aos="fade-up">
                    <img src="images/oldtimer.png" alt="Oldtimer">
                    <h3 data-aos="fade-up">Oldtimers</h3>
                </div>
                <div class="car-type-item" data-aos="fade-up">
                    <img src="images/normale.png" alt="Normale Auto">
                    <h3 data-aos="fade-up">Normale Auto's/SUV</h3>
                </div>
                <div class="car-type-item" data-aos="fade-up">
                    <img src="images/audi.png" alt="Supercar">
                    <h3 data-aos="fade-up">Luxere Auto's</h3>
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
