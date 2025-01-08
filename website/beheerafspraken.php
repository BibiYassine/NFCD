<?php
include 'connect.php';
session_start();
include 'functies/sideMenu.php';
include 'functies/functies.php';
controleerAdmin($mysqli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeheerAdmin - NFCD</title>
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
include 'connect.php'; // Zorg dat je databaseconnectie correct is

// Verwijder afspraak als er een POST-verzoek is
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['afspraak_id'])) {
    $afspraak_id = intval($_POST['afspraak_id']); // Beveilig tegen niet-integer input
    $delete_query = "DELETE FROM tblafspraken WHERE afspraak_id = ?";
    
    if ($stmt = mysqli_prepare($mysqli, $delete_query)) {
        mysqli_stmt_bind_param($stmt, 'i', $afspraak_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
        // Herladen van de pagina om te voorkomen dat hetzelfde formulier opnieuw wordt verzonden
        header('Location: beheerafspraken.php');
        exit();
    } else {
        echo "<p>Fout bij het verwijderen van afspraak.</p>";
    }
}

// Afspraken ophalen en weergeven
$query = "SELECT afspraak_id, email, service_id, datum, tijdslot, locatie FROM tblafspraken";
$result = mysqli_query($mysqli, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<table>';
    echo '<tr>';
    echo '<th>Afspraak ID</th>';
    echo '<th>Email</th>';
    echo '<th>Servicenaam</th>';
    echo '<th>Datum</th>';
    echo '<th>Tijdslot</th>';
    echo '<th>Locatie</th>';
    echo '<th>Verwijderen</th>';
    echo '</tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['afspraak_id']) . '</td>';
        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
        echo '<td>' . htmlspecialchars($row['service_id']) . '</td>';
        echo '<td>' . htmlspecialchars($row['datum']) . '</td>';
        echo '<td>' . htmlspecialchars($row['tijdslot']) . '</td>';
        echo '<td>' . htmlspecialchars($row['locatie']) . '</td>';
        echo '<td>';
        echo '<form method="post" action="">'; // Geen absolute URL, herlaad huidige pagina
        echo '<input type="hidden" name="afspraak_id" value="' . htmlspecialchars($row['afspraak_id']) . '">';
        echo '<input type="submit" value="Verwijderen">';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo '<p>Geen afspraken gevonden.</p>';
}

// Sluit de databaseverbinding
mysqli_close($mysqli);
?>





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