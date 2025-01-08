<?php
include 'connect.php';

if (isset($_POST['klantnaam']) && isset($_POST['wachtwoord']) && isset($_POST['email']) && isset($_POST['telefoonnummer'])) {
    $klantnaam = $_POST['klantnaam'];
    $wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT); // Wachtwoord hashen
    $email = $_POST['email'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $type = 'klant';

    // Controleren of de klantnaam, email of telefoonnummer al bestaat
    $stmt = $mysqli->prepare("SELECT klantnaam FROM tblklant WHERE klantnaam = ? OR email = ? OR telefoonnummer = ?");
     if ($stmt) {
        $stmt->bind_param("sss", $klantnaam, $email, $telefoonnummer); //paramaters binden
        $stmt->execute();  // voer de query uit
        $stmt->store_result(); // sla de resultaten op 


        // Als de klantnaam, email of telefoonnummer al bestaat
        if ($stmt->num_rows > 0) {
            echo "<p>Klantnaam, email of telefoonnummer bestaat al!<p>";
        } else {

            // Gegevens invoegen in de database
            $stmt->close(); // Close the previous statement
            $sql = "INSERT INTO tblklant (klantnaam, wachtwoord, email, telefoonnummer, type) VALUES (?, ?, ?, ?, ?)"; // ??? staat voor parameters 
            $stmt = $mysqli->prepare($sql); // Prepare the SQL statement

            // Als de statement correct is
            if ($stmt) {
                $stmt->bind_param("sssss", $klantnaam, $wachtwoord, $email, $telefoonnummer, $type); // Binding the parameters
                // Als de statement correct is uitgevoerd
                if ($stmt->execute()) {
                    header('Location: succes');
                } else {
                    echo "Er ging iets fout bij de registratie.";
                }
                $stmt->close(); // sluit de statement
            } else {
                echo "Er ging iets fout bij het voorbereiden van de registratie.";
            }
        }
    } else {
        echo "Er ging iets fout bij het controleren van de gegevens.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren-NFCD</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    
    <div class="form">
    <h2>Registreren</h2>
    <form action="register.php" method="POST">
        <label>Klantnaam:</label>
        <input type="text" name="klantnaam" required><br><br>
        <label>Email:</label>
        <input type="email" name="email" class="form-control" required><br><br>
        <label>Telefoonnummer:</label>
        <input type="text" name="telefoonnummer" class="form-control" required><br><br>
        <label>Wachtwoord:</label>
        <input type="password" name="wachtwoord" class="form-control" required><br><br>
        <input type="submit" value="Registreren">
    </form>
</div>
</body>
</html>
