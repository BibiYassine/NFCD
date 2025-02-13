<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['klantnaam'], $_POST['wachtwoord'], $_POST['email'], $_POST['telefoonnummer'])) {
        // Invoergegevens ophalen
        $klantnaam = $_POST['klantnaam'];
        $wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT); // Wachtwoord hashen
        $email = $_POST['email'];
        $telefoonnummer = $_POST['telefoonnummer'];
        $type = 'klant'; // Standaard type klant

        // Controleren of klantnaam, email of telefoonnummer al bestaan
        $stmt = $mysqli->prepare("SELECT klant_id FROM tblklant WHERE klantnaam = ? OR email = ? OR telefoonnummer = ?");
      
        if ($stmt) {
            $stmt->bind_param("sss", $klantnaam, $email, $telefoonnummer);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                // Als klantnaam, email of telefoonnummer al bestaan
                echo "<p style='color: red;'>Klantnaam, email of telefoonnummer bestaat al!</p>";
            } else {
                // Nieuwe klant toevoegen
                $stmt->close(); // Eerdere statement sluiten
                $stmt = $mysqli->prepare("INSERT INTO tblklant (klantnaam, wachtwoord, email, telefoonnummer, type) VALUES (?, ?, ?, ?, ?)");
                if ($stmt) {
                    $stmt->bind_param("sssss", $klantnaam, $wachtwoord, $email, $telefoonnummer, $type);
                    if ($stmt->execute()) {
                        // Succesvolle registratie
                        $klant_id = $stmt->insert_id; // Haal de id van de nieuwe klant op

                        // Verkrijg het totale aantal klanten
                        $result = $mysqli->query("SELECT COUNT(*) AS totaal FROM tblklant");
                        $row = $result->fetch_assoc();
                        $totaal_klanten = $row['totaal'];

                        // Update het totaal aantal klanten in tblklant
                        $stmt_update_totaal = $mysqli->prepare("UPDATE tblklant SET totaal_klanten = ? WHERE klant_id = ?");
                        $stmt_update_totaal->bind_param("ii", $totaal_klanten, $klant_id); // Bind de parameters
                        $stmt_update_totaal->execute();

                        header("Location: succes.php"); // Doorverwijzen naar een succespagina
                        exit();
                    } else {
                        echo "<p style='color: red;'>Er ging iets fout bij de registratie. Probeer het opnieuw.</p>";
                    }
                    $stmt->close();
                } else {
                    echo "<p style='color: red;'>Er ging iets fout bij het voorbereiden van de registratie.</p>";
                }
            }
        } else {
            echo "<p style='color: red;'>Er ging iets fout bij het controleren van de gegevens.</p>";
        }
    } else {
        echo "<p style='color: red;'>Vul alle velden in!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren - NFCD</title>
    <link rel="stylesheet" href="form2.css">
    <link rel="stylesheet" href="scroll.css"> 
</head>
<body>
<div class="wrapper">
    <form action="" method="POST">
      <h2>Nieuwe klant? <br>Maak hier een account aan!</h2>
      <div class="input-field">
        <input type="text" name="klantnaam" required autofill="off">
        <label>Kies een klantnaam</label>
      </div>
      <div class="input-field">
        <input type="text" name="email" required autofill="off">
        <label>Kies een e-mail</label>
      </div>
      <div class="input-field">
        <input type="text" id="telefoonnummer" name="telefoonnummer" maxlength="10" pattern="\d{10}" title="Voer precies 10 cijfers in" required>
        <label>Telefoonnummer</label>
      </div>
      <div class="input-field">
        <input type="password" name="wachtwoord" required>
        <label>Kies een wachtwoord</label>
      </div>
      <button type="submit">Registreren</button>
        <div class="register">
            <p>Heb je al een account? <a href="login">Log hier in</a></p>
    </form>
  </div>
</body>
</html>
