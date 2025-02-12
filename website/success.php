<?php
session_start();
include 'connect.php';
include 'functies/functies.php';
include 'functies/sideMenu.php';
if (!$_GET['id']) {
    header("Location: services");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Succes</title>
    <link rel="stylesheet" href="css/succes.css">

</head>
<body>

<div class="form">
        <p>Je afspraak is succesvol geboek.</p>
        <p>Je ontvangt een bevestiging per mail.</p>
        <br>
        
</div>

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