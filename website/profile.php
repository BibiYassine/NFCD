<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="form.css">
    
    <title>Profile-NFCD</title>
    <link rel="shortcut icon" href="images/prof.png" type="image/x-icon">
</head>
<body>

<?php
include 'connect.php';
session_start();
include 'functies/sideMenu.php';

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['klantnaam'])) {
    header("Location: login.php");
    exit();
}

// Controleer of de gegevens zijn bijgewerkt
if (!isset($_SESSION['updated'])) {
    $_SESSION['updated'] = false;
}

// Welkomstbericht
echo "<h1>Mijn Gegevens</h1>";

// Haal de gegevens van de ingelogde gebruiker op
$stmt = $mysqli->prepare("SELECT * FROM tblklant WHERE klantnaam = ?");
$stmt->bind_param("s", $_SESSION['klantnaam']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Verwerk het formulier als het is ingediend
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'update') {
        $nieuweNaam = $_POST['klantnaam'];
        $nieuwEmail = $_POST['email'];
        $nieuwAdres = $_POST['adres'];
        $nieuwPostcode = $_POST['postcode'];
        $nieuwPlaats = $_POST['plaats'];
        $nieuwTelefoonnummer = $_POST['landcode'] . $_POST['telefoonnummer'];

        // Update de gegevens in de database
        $updateStmt = $mysqli->prepare("UPDATE tblklant SET klantnaam = ?, email = ?, adres = ?, postcode = ?, plaats = ?, telefoonnummer = ? WHERE klantnaam = ?");
        $updateStmt->bind_param("sssssss", $nieuweNaam, $nieuwEmail, $nieuwAdres, $nieuwPostcode, $nieuwPlaats, $nieuwTelefoonnummer, $_SESSION['klantnaam']);
        $updateStmt->execute();

        // Verander de sessienaam als de gebruikersnaam is aangepast
        $_SESSION['klantnaam'] = $nieuweNaam;

        // Stel de sessievariabele in om te markeren dat de gegevens zijn bijgewerkt
        $_SESSION['updated'] = true;

        // Voeg JavaScript toe om de pagina zonder melding te herladen
        echo '<meta http-equiv="refresh" content="0">';
    } elseif (isset($_POST['action']) && $_POST['action'] === 'delete') {
        // Verwijder het account uit de database
        $deleteStmt = $mysqli->prepare("DELETE FROM tblklant WHERE klantnaam = ?");
        $deleteStmt->bind_param("s", $_SESSION['klantnaam']);
        $deleteStmt->execute();

        // Vernietig de sessie en log de gebruiker uit
        session_destroy();
        header("Location: index.php");
        exit();
    }
}

// Controleer of de pagina net is herladen na een update
if ($_SESSION['updated'] === true) {
    echo '<p class="success-message">Je gegevens zijn succesvol bijgewerkt!</p>';
    $_SESSION['updated'] = false;
}

// Formulier voor gegevensbewerking met huidige waarden in de velden
echo '<form method="POST" action="">';
echo '<label for="klantnaam">Naam:</label>';
echo '<input type="text" id="klantnaam" name="klantnaam" value="' . $user['klantnaam'] . '" placeholder="Voer uw naam in" required><br>';

echo '<label for="email">Email:</label>';
echo '<input type="text" id="email" name="email" value="' . $user['email'] . '" placeholder="Voer uw email in" required><br>';

echo '<label for="adres">Adres:</label>';
echo '<input type="text" id="adres" name="adres" value="' . $user['adres'] . '" placeholder="Voer uw adres in" required><br>';

echo '<label for="postcode">Postcode:</label>';
echo '<input type="text" id="postcode" name="postcode" value="' . $user['postcode'] . '" placeholder="Voer uw postcode in" required><br>';

echo '<label for="plaats">Plaats:</label>';
echo '<input type="text" id="plaats" name="plaats" value="' . $user['plaats'] . '" placeholder="Voer uw plaats in" required><br>';

echo '<label for="telefoonnummer">Telefoonnummer:</label>';
echo '<div class="phone-input-group">';
echo '<select id="landcode" name="landcode" onchange="formatPhoneNumber()">';
echo '<option value="+32" data-flag="images/belgie.png" ' . (substr($user['telefoonnummer'], 0, 3) === "+32" ? "selected" : "") . '>🇧🇪 +32</option>';
echo '<option value="+31" data-flag="images/nederland.png" ' . (substr($user['telefoonnummer'], 0, 3) === "+31" ? "selected" : "") . '>🇳🇱 +31</option>';
echo '<option value="+33" data-flag="images/frankrijk.png" ' . (substr($user['telefoonnummer'], 0, 3) === "+33" ? "selected" : "") . '>🇫🇷 +33</option>';
echo '</select>';
echo '<input type="text" id="telefoonnummer" name="telefoonnummer" value="' . substr($user['telefoonnummer'], 3) . '" placeholder="Voer uw telefoonnummer in" required oninput="formatPhoneNumber()">';
echo '</div><br>';

echo '<input type="hidden" name="action" value="update">';
echo '<input type="submit" value="Wijzig gegevens">';
echo '</form>';

// Voeg een knop toe om het account te verwijderen
echo '<form method="POST" action="" onsubmit="return confirmDelete();">';
echo '<input type="hidden" name="action" value="delete">';
echo '<input type="submit" value="Verwijder Account" style="color: red;">';
echo '</form>';

// Voeg een knop toe om uit te loggen
echo '<form method="POST" action="logout.php">';
echo '<input type="submit" value="Log uit">';
echo '</form>';
?>

<script>
    function openNav() {
        document.getElementById("sidenav").style.width = "250px"; // Open de sidenav
    }

    function closeNav() {
        document.getElementById("sidenav").style.width = "0"; // Sluit de sidenav
    }

    AOS.init();
    function confirmDelete() {
        return confirm("Weet je zeker dat je je account wilt verwijderen? Dit kan niet ongedaan gemaakt worden.");
    }

    // Verberg de succesmelding na 10 seconden
    setTimeout(function() {
        const successMessage = document.querySelector('.success-message');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 10000); // 10000 milliseconden = 10 seconden

    function formatPhoneNumber() {
        const phoneInput = document.getElementById('telefoonnummer');
        const landcode = document.getElementById('landcode').value;

        // Verwijder alle niet-numerieke karakters
        let phoneNumber = phoneInput.value.replace(/\D/g, '');

        // Voeg spaties toe volgens de gewenste indeling
        if (phoneNumber.length > 3) {
            phoneNumber = phoneNumber.slice(0, 3) + ' ' + phoneNumber.slice(3);
        }
        if (phoneNumber.length > 6) {
            phoneNumber = phoneNumber.slice(0, 6) + ' ' + phoneNumber.slice(6);
        }
        if (phoneNumber.length > 9) {
            phoneNumber = phoneNumber.slice(0, 9) + ' ' + phoneNumber.slice(9);
        }

        phoneInput.value = phoneNumber.trim();
    }
</script>
</body>
</html>
