<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact-NFCD</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="contact.css">
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

            <div class="gemeentes" data-aos="fade-up" id="gemeentes">
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
   


  
        <footer class="footer">
<div class="container bottom_border">
<div class="row">
<div class=" col-sm-4 col-md col-sm-4  col-12 col">
<h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
<!--headin5_amrc-->
<p class="mb10">NFCD, het bedrijf dat uw wagen nodig heeft om er zo nieuw mogelijk uit te zien. Wij behandelen met alle plezier auto's die gedeepcleaned moeten worden, auto's die er terug showroom ready moeten uitzien. Dus aarzel niet om een afspraak te boeken.</p>
<br>

<p><a href="https://www.google.com/maps/dir/51.0518685,4.5186688/Mechelsesteenweg+164,+Sint-Katelijne-Waver+2860+Sint-Katelijne-Waver,+Belgi%C3%AB/@51.0518395,4.4362685,12z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x47c3e48aecc3e83f:0xf833427cd19a530!2m2!1d4.5186688!2d51.0518685?entry=ttu&g_ep=EgoyMDI0MTExMC4wIKXMDSoASAFQAw%3D%3D"><i class="fa fa-location-arrow"></i> Mechelsesteenweg 164 2860 Sint-Katelijne-Waver </p></a>
<p><i class="fa fa-phone"></i>  +32 499 91 21 81 </p>
<p><i class="fa fa fa-envelope"></i> needforcardetailing@gmail.com </p>


</div>

<div class=" col-sm-4 col-md  col-6 col">
<h5 class="headin5_amrc col_white_amrc pt2">Veel bezocht</h5>
<!--headin5_amrc-->
<ul class="footer_ul_amrc">
<li><a href="services">Onze Pakketen</a></li>
<li><a href="#car-types">Cartypes</a></li>
<li><a href="contact#gemeentes">Welke steden?</a></li>
<li><a href="#faq">Faq</a></li>
</ul>
<!--footer_ul_amrc ends here-->
</div>

<div class="container">
<ul class="foote_bottom_ul_amrc">
<li><a href="home">Home</a></li>
<li><a href="over">Over NFCD</a></li>
<li><a href="services">Services</a></li>
<li><a href="contact">Contact</a></li>
<li><a href="login">Login</a></li>
<li><a href="register">Register</a></li>
<li><a href="https://www.google.com/maps/dir/51.0518685,4.5186688/Mechelsesteenweg+164,+Sint-Katelijne-Waver+2860+Sint-Katelijne-Waver,+Belgi%C3%AB/@51.0518395,4.4362685,12z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x47c3e48aecc3e83f:0xf833427cd19a530!2m2!1d4.5186688!2d51.0518685?entry=ttu&g_ep=EgoyMDI0MTExMC4wIKXMDSoASAFQAw%3D%3D">Locatie</a></li>
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



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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
