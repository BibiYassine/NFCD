<?php
session_start(); // Start the session
include 'connect.php'; // Database connection
include 'functies/sideMenu.php'; // Sidebar menu
include 'functies/functies.php'; // Additional functions


// Maintenance mode function
onderhoudsModus();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login");
    exit(); // If not logged in, redirect to login page
}


?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boek een service</title>
    <link rel="stylesheet" href="boeken.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <script src="libraries/aos.js"></script>
    <link rel="stylesheet" href="boeken.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    

</head>
<body>

    

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