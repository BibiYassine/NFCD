<?php
    include 'connect.php';
    session_start();
    if(!isset($_SESSION['type'])){
        $_SESSION['type'] = "gast";
    }
    include 'functies/sideMenu.php';
    include 'functies/functies.php';
    onderhoudsModus();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services-NFCD</title>
    <link rel="shortcut icon" href="images/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/services.css">
    <link rel="stylesheet" href="libraries/aos.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    
    
</head>
<body>
<main>
    <section class="services-section" >
        <h2 data-aos="fade-up">Onze Pakketten</h2>

        <!-- classic -->
        <div class="services-container" data-aos="fade-up">
            <div class="service-item" data-aos="fade-up">
                <div class="slider">
                    <img src="images/classicskoda.png" alt="Classic Pakket 2" class="slider-image" data aos="fade-up">
                </div>
                <br>
                <div class="slider">
                <img src="images/after1.png" alt="Classic Pakket 1" class="slider-image" data aos="fade-up">

                </div>
         
                <h3 id="classic" data aos="fade-up">Classic - €30</h3>
               
               
            </div>
<!-- Refresh -->

            <div class="service-item" data-aos="fade-up">
                <div class="slider">
                    
                    <img src="images/polo1.png" alt="Refresh Pakket 2" class="slider-image" data aos="fade-up">
                </div>
                <br>
                <div class="slider">
                <img src="images/polo.png" alt="Refresh Pakket 1" class="slider-image" data aos="fade-up">
                </div>
                <h3 data-aos="fade-up">Refresh - €85</h3>
                
            </div>


<!-- Diamond -->

            <div class="service-item" data-aos="fade-up">
                <div class="slider">
                  
                    <img src="images/ext.png" alt="Diamond Pakket 2" class="slider-image" data aos="fade-up">
                </div>
                <br>
                <div class="slider">
                <img src="images/refresh.png" alt="Diamond Pakket 1" class="slider-image" data aos="fade-up">
                </div>
                <h3 data-aos="fade-up">Diamond - €130</h3>
            </div>
            <br>
        </div>
        <br>
        <div class="prijzen" data aos="fade-up">
        <h2>Hieronder vindt u een overzicht van onze diensten:</h2 data aos="fade-up">
        <br>
        <img src="images/prijzen.png" alt="contact" class="contact-img" data-aos="fade-up">
        </div>
    </section>


<center><a href="contact#cont-form" class="book-button" data aos="fade-up">Boek hier je afspraak.</a></center>


<?php
    include 'functies/footer.php';
?>

</main>
<script src="services.js"></script>
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
