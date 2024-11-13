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
    <title>Beheren-Admin</title>
    <link rel="stylesheet" href="beheerafspraak.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>
<body>

<?php
$query = "SELECT afspraak_id, email, servicenaam, datum, tijdslot, locatie FROM tblafspraken";
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
        echo '<td>' . $row['afspraak_id'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['servicenaam'] . '</td>';
        echo '<td>' . $row['datum'] . '</td>';
        echo '<td>' . $row['tijdslot'] . '</td>';
        echo '<td>' . $row['locatie'] . '</td>';
        echo '<td>';
        echo '<form method="post" action="beheerafspraken.php">';
        echo '<input type="hidden" name="afspraak_id" value="' . $row['afspraak_id'] . '">';
        echo '<input type="submit" value="Verwijderen">';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo '<p>Geen afspraken gevonden.</p>';
}

if (isset($_POST['afspraak_id'])) {
    $delete_query = "DELETE FROM tblafspraken WHERE afspraak_id = ?";
    $stmt = mysqli_prepare($mysqli, $delete_query);
    mysqli_stmt_bind_param($stmt, 'i', $_POST['afspraak_id']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('Location: beheerafspraken.php');
}


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