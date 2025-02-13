<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NFCD</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
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
            //initaliseerd de klant variabele zodat er verder geen errors komen voor bezoekers die niet zijn ingelogd.
            if(!isset($_SESSION['email'])){
                $_SESSION['email'] = "gast";
            }
            include 'functies/sideMenu.php';
            include 'functies/functies.php';
            onderhoudsModus();
            controleerAdmin($mysqli);
      ?>

<span class="menu-toggle" onclick="openNav()">&#9776;</span>

    
    <main>
        <section id="home" class="hero">
            <h1>Welkom op de officiële website van NFCD</h1>
            <p>NeedForCarDetailing, Het detail bedrijf dat uw wagen nodig heeft.</p>
            <a href="over.php" class="btn">Lees hier meer</a>
        </section>

            <?php
        
        $sql = "SELECT r.rating, r.text, k.klantnaam 
                FROM reviews r
                JOIN tblklant k ON r.klant_id = k.klant_id
                ORDER BY RAND() LIMIT 4";
        
        $result = $mysqli->query($sql);
        
        // Controleer of er resultaten zijn
        if ($result->num_rows > 0) {
            echo '<section id="reviews" class="reviews">';

            while ($row = $result->fetch_assoc()) {
                echo '<div class="review">';
                // Toon de naam van de klant
                echo '<h5>' . htmlspecialchars($row["klantnaam"]) . '</h5>';
        
                // Sterren weergeven
                echo '<div class="stars">';
                for ($i = 0; $i < $row["rating"]; $i++) {
                    echo '⭐';
                }
                echo '</div>';
                
                // Reviewtekst weergeven
                echo '<p>' . htmlspecialchars($row["text"]) . '</p>';
                echo '</div>';
            }
           
            echo '</section>';
            
        } else {
            echo "<p>Geen reviews gevonden.</p>";
        }
        
        // Sluit de databaseverbinding
        $mysqli->close();
        ?>
    <div>    
        <section id="faq" class="faq">
            <h2>Veel Gestelde Vragen (FAQ)</h2 data-aos="fade-up">
            <p>Dit zijn de meest gestelde vragen die wij krijgen als detailing bedrijf.</p>
            <div class="faq-container">
                <div class="faq-item" data-aos="fade-up">
                    <img src="images/faq1.png" alt="Icon 1">
                    <h3>Waarom kiezen voor een detailing?</h3>
                    <p>Detailen heeft veel pluspunten. Je auto nieuw laten lijken/showroom nieuw laten lijken van binnen, geen krassen bij het wassen van het exterieur. Het wordt met tijd en liefde verzorgd zodat het eindresultaat zo goed mogelijk is.</p>
                </div>
                <div class="faq-item" data-aos="fade-up">
                    <img src="images/faq2.png" alt="Icon 2">
                    <h3>Wat is de duur van een detailbeurt</h3>
                    <p> Een standaard reiniging duurt ongeveer 2 à 3 uurtjes. Maar dit hangt er vanaf van de service die je wenst.</p>
                </div>
                <div class="faq-item" data-aos="fade-up">
                    <img src="images/faq3.png" alt="Icon 3">
                    <h3>Hoe vaak een detail beurt?</h3>
                    <p>We vinden zelf dat je rond de 2 keer per jaar je wagen zou moeten detailen. Een carwash is zeker aangeraden om de 2 à 3 weken.</p>
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
                    <img src="images/alcantara.png" alt="Alcantara Cleaning">
                    <br>
                    <br>
                    <hr>
                    <h3 data-aos="fade-up">Alcantara Cleaning</h3>
                    <p data-aos="fade-up">Specialistische reiniging voor Alcantara stoffen.</p>
                </div>
                <div class="service-item">
                <img src="images/ext.png" alt="Dieptereiniging">
                    <br>
                    <br>
                    <hr>
                    <h3 data-aos="fade-up">Dieptereiniging</h3>
                    <p data-aos="fade-up">Een grondige reiniging van uw voertuig, van binnen en buiten.</p>
                </div>
                <div class="service-item" data-aos="fade-up">
                    <img src="images/refresh.png" alt="Leder Cleaning">
                    <br>
                    <br>
                    <hr>
                    <h3 data-aos="fade-up">Leder Cleaning</h3>
                    <p data-aos="fade-up">Professionele reiniging en onderhoud van lederen bekleding.</p>
                </div>
                <div class="service-item" data-aos="fade-up">
                    <img src="images/matten.jpg" alt="Interieur Reiniging">
                    <br>
                    <br>
                    <hr>
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
                    <img src="images/190Dbuiten.png" alt="Oldtimer">
                    <br>
                    <br>
                    <br>
                    <hr>
                    <h3 data-aos="fade-up">Oldtimers</h3>
                </div>
                <div class="car-type-item" data-aos="fade-up">
                    <img src="images/c220.png" alt="Normale Auto">
                    <br>
                    <br>
                    <br>
                    <hr>
                    <h3 data-aos="fade-up">Normale Auto's/SUV</h3>
                </div>
                <div class="car-type-item" data-aos="fade-up">
                    <img src="images/jaguar.png" alt="Supercar">
                    <br>
                    <br>
                    <br>
                    <hr>
                    <h3 data-aos="fade-up">Luxere Auto's</h3>
                </div>
               
            </div>
        </section>
        

        <?php
    include 'functies/footer.php';
?>

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
</body>
</html>
