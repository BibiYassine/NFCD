<?php
// Inclusief database connectie
include 'connect.php';

// Start een nieuwe of bestaande sessie
session_start();

// Inclusief de functies voor het zijmenu en algemene functies
include 'functies/sideMenu.php';
include 'functies/functies.php';

// Controleer of de gebruiker admin-rechten heeft
controleerAdmin($mysqli);

// Verwerk het verwijderverzoek als het formulier is ingediend
if (isset($_POST['klant_id'])) {
    $klant_id = $_POST['klant_id'];
    
    // Bereid de SQL-query voor om een klant te verwijderen
    $deleteQuery = "DELETE FROM tblklant WHERE klant_id = ?";
    $stmt = mysqli_prepare($mysqli, $deleteQuery);
    mysqli_stmt_bind_param($stmt, "i", $klant_id); // Bind het klant_id aan de query
    
    // Voer de query uit en geef feedback aan de gebruiker
    if (mysqli_stmt_execute($stmt)) {
        echo "<p style='color: green;'>Klant met ID $klant_id is verwijderd.</p>";
    } else {
        echo "<p style='color: red;'>Fout bij het verwijderen van klant.</p>";
    }
    // Sluit de prepared statement
    mysqli_stmt_close($stmt);
}

// Verwerk het wijzigingsverzoek voor het klanttype als het formulier is ingediend
if (isset($_POST['klant_id_update']) && isset($_POST['type'])) {
    $klant_id_update = $_POST['klant_id_update'];
    $new_type = $_POST['type'];

    // Bereid de SQL-query voor om het klanttype bij te werken
    $updateQuery = "UPDATE tblklant SET type = ? WHERE klant_id = ?";
    $stmt = mysqli_prepare($mysqli, $updateQuery);
    mysqli_stmt_bind_param($stmt, "si", $new_type, $klant_id_update);
    
    // Voer de query uit en geef feedback aan de gebruiker
    if (mysqli_stmt_execute($stmt)) {
        echo "<p style='color: green;'>Type van klant met ID $klant_id_update is gewijzigd naar $new_type.</p>";
    } else {
        echo "<p style='color: red;'>Fout bij het wijzigen van het klanttype.</p>";
    }
    // Sluit de prepared statement
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klanten</title>
    <!-- Inclusief CSS-bestanden -->
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="over.css">
    <link rel="stylesheet" href="terug.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>
<body>

<!-- Terugknop -->
<h4><a href="admin.php"><img class="back" src="images/goback.png"></a></h4>

<!-- Lijst van klanten -->
<div class="klanten-lijst">
    <h2>Lijst van Klanten</h2>
    <ul>
    <?php
    // Selecteer alle klanten uit de database
    $query = "SELECT klant_id, klantnaam, email, telefoonnummer, adres, plaats, postcode, type FROM tblklant";
    $result = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($result) > 0) {
        // Doorloop de resultaten en toon ze in een lijst
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<li>';
            echo '<strong>Klantnaam:</strong> ' . $row['klantnaam'] . '<br>';
            echo '<strong>Email:</strong> ' . $row['email'] . '<br>';
            echo '<strong>Telefoonnummer:</strong> ' . $row['telefoonnummer'] . '<br>';
            echo '<strong>Adres:</strong> ' . $row['adres'] . '<br>';
            echo '<strong>Plaats:</strong> ' . $row['plaats'] . '<br>';
            echo '<strong>Postcode:</strong> ' . $row['postcode'] . '<br>';
            echo '<strong>Type:</strong> ' . $row['type'] . '<br>';

            // Formulier om een klanttype te wijzigen
            echo '<form method="POST" action="">';
            echo '<input type="hidden" name="klant_id_update" value="' . $row['klant_id'] . '">';
            echo '<label for="type">Wijzig type:</label>';
            echo'<br>';
            echo '<select name="type" id="type">';
            echo '<option value="klant"' . ($row['type'] == 'klant' ? ' selected' : '') . '>Klant</option>';
            echo '<option value="admin"' . ($row['type'] == 'admin' ? ' selected' : '') . '>Admin</option>';
            echo '</select>';
            echo '<br>';
            echo '<br>';
            echo '<input type="submit" value="Wijzig Type" style="color: green;">';
            echo '</form>';

            // Formulier om een klant te verwijderen
            echo '<form method="POST" action="" onsubmit="return confirmDelete();">';
            echo '<input type="hidden" name="klant_id" value="' . $row['klant_id'] . '">';
            echo '<input type="submit" value="Verwijder Account" style="color: red;">';
            echo '</form>';

            echo '</li><hr>';
        }
    } else {
        // Toon een bericht als er geen klanten zijn
        echo '<p>Geen klanten gevonden.</p>';
    }
    ?>
    </ul>
</div>

<!-- Inclusief scripts -->
<script src="libraries/aos.js"></script>
<script>
     function openNav() {
            document.getElementById("sidenav").style.width = "250px"; 
        }

        function closeNav() {
            document.getElementById("sidenav").style.width = "0"; 
        }



    // Bevestigingsfunctie voor het verwijderen van een klant
    function confirmDelete() {
        return confirm("Weet je zeker dat je dit account wilt verwijderen? Dit kan niet hersteld worden.");
    }

    // Initialiseer animaties met AOS
    AOS.init();
</script>

</body>
</html>
