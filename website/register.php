<?php
include 'connect.php';

if (isset($_POST['klantnaam']) && isset($_POST['wachtwoord']) && isset($_POST['email'])) {
    $klantnaam = $_POST['klantnaam'];
    $wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT); // Wachtwoord hashen
    $email = $_POST['email'];
    $type = 'klant'; // Standaard type gebruiker (kan aangepast worden naar admin indien gewenst)

    // Controleren of de klantnaam al bestaat
    $stmt = $mysqli->prepare("SELECT klantnaam FROM tblklant WHERE klantnaam = ?");
    $stmt->bind_param("s", $klantnaam); // Binding the parameter as a string
    $stmt->execute();
    $stmt->store_result(); // Store the result to check the number of rows

    if ($stmt->num_rows > 0) {
        echo "Klantnaam bestaat al!";
    } else {
        // Gegevens invoegen in de database
        $stmt->close(); // Close the previous statement
        $sql = "INSERT INTO tblklant (klantnaam, wachtwoord, email, type) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ssss", $klantnaam, $wachtwoord, $email, $type); // Binding the parameters
        if ($stmt->execute()) {
            header ('Location: succes.html');
        } else {
            echo "Er ging iets fout bij de registratie.";
        }
    }
    $stmt->close(); // Close the statement after usage
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
        <input type="text" name="email" class= "form-control" required><br><br>
        <label>Wachtwoord:</label>
        <input type="password" name="wachtwoord" class= "form-control" required><br><br>
        <input type="submit" value="Registreren">
        
    </form>
</div>
</body>
</html>
