<?php
session_start();
include 'connect.php';
include 'functies/sideMenu.php';
include 'functies/functies.php';
onderhoudsModus();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boeken </title>
    <link rel="stylesheet" href="boeken.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>
<body>
    

<br>
<br>
<br>
    <h3>Boek hier je afspraak</h3>

   
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