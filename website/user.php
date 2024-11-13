<?php
include 'connect.php'; // Connect to the database
session_start();
include 'functies/sideMenu.php';
include 'functies/functies.php';
controleerAdmin($mysqli);

// Handle delete request if the form is submitted
if (isset($_POST['klant_id'])) {
    $klant_id = $_POST['klant_id'];
    
    // Prepare the delete query
    $deleteQuery = "DELETE FROM tblklant WHERE klant_id = ?";
    $stmt = mysqli_prepare($mysqli, $deleteQuery);
    mysqli_stmt_bind_param($stmt, "i", $klant_id);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "<p style='color: green;'>Klant met ID $klant_id is verwijderd.</p>";
    } else {
        echo "<p style='color: red;'>Fout bij het verwijderen van klant.</p>";
    }
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klanten</title>
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="over.css">
    <link rel="stylesheet" href="terug.css">
    
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>
<body>

<!-- Back Button -->
<h4><a href="admin.php"><img class="back" src="images/goback.png"></a></h4>

<!-- Klanten List -->
<div class="klanten-lijst">
    <h2>Lijst van Klanten</h2>
    <ul>
    <?php
    // Select all customers from the database
    $query = "SELECT klant_id, klantnaam, email, telefoonnummer, adres, plaats, postcode, type FROM tblklant";
    $result = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($result) > 0) {
        // Loop through the results and display them in a list
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<li>';
            echo '<strong>Klantnaam:</strong> ' . $row['klantnaam'] . '<br>';
            echo '<strong>Email:</strong> ' . $row['email'] . '<br>';
            echo '<strong>Telefoonnummer:</strong> ' . $row['telefoonnummer'] . '<br>';
            echo '<strong>Adres:</strong> ' . $row['adres'] . '<br>';
            echo '<strong>Plaats:</strong> ' . $row['plaats'] . '<br>';
            echo '<strong>Postcode:</strong> ' . $row['postcode'] . '<br>';
            echo '<strong>Type:</strong> ' . $row['type'] . '<br>';

            // Delete form for each customer
            echo '<form method="POST" action="" " onsubmit="return confirmDelete();">';
            echo '<input type="hidden" name="klant_id" value="' . $row['klant_id'] . '">';
            echo '<input type="submit" value="Verwijder Account" style="color: red;">';
            echo '</form>';

            echo '</li><hr>';
        }
    } else {
        echo '<p>Geen klanten gevonden.</p>';
    }
    ?>
    </ul>
</div>

<script src="libraries/aos.js"></script>
<script>
    function openNav() {
        document.getElementById("sidenav").style.width = "250px"; // Open the sidenav
    }

    function closeNav() {
        document.getElementById("sidenav").style.width = "0"; // Close the sidenav
    }
    function confirmDelete() {
        return confirm("Weet je zeker dat je je account wilt verwijderen? Dit kan niet hersteld worden.");
    }
    AOS.init();
</script>

</body>
</html>
