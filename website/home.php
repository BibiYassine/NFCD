
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-NFCD</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">    
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
                    <img src="images/alcantara.png" alt="Alcantara Cleaning">
                    <h3 data-aos="fade-up">Alcantara Cleaning</h3>
                    <p data-aos="fade-up">Specialistische reiniging voor Alcantara stoffen.</p>
                </div>
                <div class="service-item">
                <img src="images/ext.png" alt="Dieptereiniging">
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
                    <img src="images/jaguar.png" alt="Supercar">
                    <h3 data-aos="fade-up">Luxere Auto's</h3>
                </div>
               
            </div>
        </section>
        

        <footer class="footer">
<div class="container bottom_border">
<div class="row">
<div class=" col-sm-4 col-md col-sm-4  col-12 col">
<h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
<!--headin5_amrc-->
<p class="mb10">NFCD, het bedrijf dat uw wagen nodig heeft om er zo nieuw mogelijk uit te zien. Wij behandelen met alle plezier auto's die gedeepcleaned moeten worden, auto's die er terug showroom ready moeten uitzien. Dus aarzel niet om een afspraak te boeken.</p>
<br>

<p><a href="https://www.google.be/maps/place/Mechelsesteenweg,+2860+Sint-Katelijne-Waver/@51.0523262,4.5174803,17z/data=!3m1!4b1!4m6!3m5!1s0x47c3e4f4b7a5b4fb:0x3ad639d2357511a9!8m2!3d51.0523262!4d4.5200552!16s%2Fg%2F1tdr2grh?hl=nl&entry=ttu&g_ep=EgoyMDI0MTExMS4wIKXMDSoASAFQAw%3D%3D"><i class="fa fa-location-arrow"></i> Mechelsesteenweg 2860 Sint-Katelijne-Waver </p></a>
<p><i class="fa fa-phone"></i>  +32 499 91 21 81 </p>
<p><i class="fa fa fa-envelope"></i> needforcardetailing@gmail.com </p>


</div>

<div class=" col-sm-4 col-md  col-6 col">
<h5 class="headin5_amrc col_white_amrc pt2">Veel bezocht</h5>
<!--headin5_amrc-->
<ul class="footer_ul_amrc">
<li><a href="services">Onze Pakketen</a></li>
<li><a href="home#services">Wat bieden we aan?</a></li>
<li><a href="contact#gemeentes">Welke steden?</a></li>
<li><a href="home#faq">Faq</a></li>
</ul>
<!--footer_ul_amrc ends here-->
</div>

<div class="container">
<ul class="foote_bottom_ul_amrc">
<li><a href="home">Home</a></li>
<li><a href="services">Services</a></li>
<li><a href="contact">Contact</a></li>
<li><a href="register">Register</a></li>
</ul>
<!--foote_bottom_ul_amrc ends here-->
<p class="text-center">Copyright @2024 | Designed With by NeedForCarDetailing</p>
<ul class="social_footer_ul">
<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
<li><a href="https://www.instagram.com/needforcardetailing/"><i class="fab fa-instagram"></i></a></li>
</ul>
<!--social_footer_ul ends here-->
</div>

</footer>

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
