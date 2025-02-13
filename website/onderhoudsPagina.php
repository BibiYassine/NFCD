
<?php
session_start();
include 'connect.php';
include 'functies/functies.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onderhoudspagina</title>
    <link rel="stylesheet" href="onderhoud.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    
</head>
<body>
    <div class="maintenance-container">
        <h1>We zijn momenteel bezig met onderhoud</h1>
        <p>Onze website wordt aangepast om u een betere ervaring te bieden. Bedankt voor uw geduld.</p>
        <p>Kom later nog eens terug!</p>
        <br><a href="login.php">Login hier in.</a>
        <br><a href="index">Probeer opnieuw</a>
        <div class="loader"></div>
    </div>
</body>
</html>
