

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afspraken-NFCD</title>
   <link rel="stylesheet" href="beheerafspraak.css">
   <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>
<body>

<?php
include 'connect.php';
session_start();
include 'functies/sideMenu.php';
include 'functies/functies.php';
onderhoudsModus();
?>


<h2>Uw Afspraken</h2>


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