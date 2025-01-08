

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Afspraken - NFCD</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="form.css">    
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


<h2>Uw Afspraken</h2>

<?php


if (!isset($_SESSION['email'])) {
    echo "<p>U bent niet ingelogd. Log in om uw afspraken te bekijken.</p>";
    exit();
}

$email = $_SESSION['email']; // Haal het e-mailadres op uit de sessie

// Query om afspraken op te halen op basis van het e-mailadres
$sql = "SELECT afspraak_id, service_id, datum, tijdslot, locatie 
        FROM tblafspraken 
        WHERE email = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $email); // Bind het e-mailadres aan de query
$stmt->execute();
$result = $stmt->get_result();

// Controleer of er afspraken zijn gevonden
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Afspraken-ID</th><th>Service-ID</th><th>Datum</th><th>Tijdslot</th><th>Locatie</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['afspraak_id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['service_id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['datum']) . "</td>";
        echo "<td>" . htmlspecialchars($row['tijdslot']) . "</td>";
        echo "<td>" . htmlspecialchars($row['locatie']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>U heeft nog geen afspraken.</p>";
}

$stmt->close();
$mysqli->close();
?>


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