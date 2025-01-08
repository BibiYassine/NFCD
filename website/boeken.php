<?php
// Start session and include necessary files
session_start();
include 'connect.php'; // Database connection
include 'functies/sideMenu.php'; // Sidebar menu
include 'functies/functies.php'; // Additional functions

// Maintenance mode function
onderhoudsModus();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login");
    exit(); // If not logged in, redirect to login page
}

// Get the logged-in user's details from tblklant using their email
$email = $_SESSION['email'];
$query = "SELECT adres, postcode, plaats FROM tblklant WHERE email = ?";
$stmt = mysqli_prepare($mysqli, $query);
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $adres, $postcode, $plaats);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

// Determine if user's address is available
$user_has_address = !empty($adres) && !empty($postcode) && !empty($plaats);

// Fetch available services from the database
$services = [];
$query = "SELECT * FROM tblservice";
$result = mysqli_query($mysqli, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $services[] = $row;
}

// Fetch available locations from tbllocatie
$locations = [];
$query = "SELECT locatie_id, adresnaam, adres FROM tbllocatie";
$result = mysqli_query($mysqli, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $locations[] = $row;
}

// Build a single string of HTML for location options
$location_options = "<option value=''>Selecteer een locatie</option>";

// Add user's profile address as a location option if it’s available
if ($user_has_address) {
    $user_location = "$adres, $postcode $plaats";
    $location_options .= "<option value='$user_location'>Mijn Adres - $user_location</option>";
} else {
    $location_options .= "<option value='' disabled>Geen adres gelinkt aan account, vul er een in bij mijn profiel</option>";
}

// Append additional locations from the tbllocatie table
foreach ($locations as $location) {
    $location_options .= "<option value='{$location['adres']}'>{$location['adresnaam']} - {$location['adres']}</option>";
}

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form values
    $service_id = $_POST['service_id'];
    $datum = $_POST['datum'];
    $tijdslot = $_POST['tijdslot'];
    // Save the selected location address directly from the form submission
    $locatie = $_POST['locatie'];

    // Fetch service time duration
    $service_query = "SELECT tijd FROM tblservice WHERE service_id = ?";
    $stmt = mysqli_prepare($mysqli, $service_query);
    mysqli_stmt_bind_param($stmt, 'i', $service_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $servicetijd);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    // Calculate end time based on selected time slot and service duration
    $eindtijd = date('H:i:s', strtotime($tijdslot) + strtotime($servicetijd) - strtotime('00:00:00'));

    // Check if the time slot is available
    $check_query = "SELECT * FROM tblafspraken WHERE datum = ? AND ((tijdslot <= ? AND ADDTIME(tijdslot, ?) > ?) OR (tijdslot >= ? AND tijdslot < ?))";
    $stmt = mysqli_prepare($mysqli, $check_query);
    mysqli_stmt_bind_param($stmt, 'ssssss', $datum, $tijdslot, $servicetijd, $tijdslot, $tijdslot, $eindtijd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $is_available = mysqli_stmt_num_rows($stmt) === 0; // True if no conflict
    mysqli_stmt_close($stmt);

    // If time slot is available, save the appointment to the database
    if ($is_available) {
        $insert_query = "INSERT INTO tblafspraken (email,service_id, datum, tijdslot, locatie) VALUES (?, ?, ?, ?, ?)";
        $sql = "SELECT service_id FROM tblservice WHERE servicenaam = ?";
        $stmt = mysqli_prepare($mysqli, $sql);
        mysqli_stmt_bind_param($stmt, 's', $services[$service_id - 1]['servicenaam']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $service_id);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
        $stmt = mysqli_prepare($mysqli, $insert_query);
        mysqli_stmt_bind_param($stmt, 'sisss', $email, $service_id, $datum, $tijdslot, $locatie);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $afspraak_id = $mysqli->insert_id; 
        

       header("Location: email.php?afspraak_id=$afspraak_id");
    } else {
        echo "<p class='error'>Dit tijdslot is al bezet. Kies een ander tijdslot.</p>";
    }
}

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boek een service</title>
    <link rel="stylesheet" href="boeken.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <script src="libraries/aos.js"></script>
    <link rel="stylesheet" href="boeken.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    

    <!-- Add custom CSS styles for success and error messages -->
    <style>
        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>

    <div class="booking-container">
        <p>Je moet eerst inloggen om een afspraak te boeken anders werkt het niet. Dus log eerst in als je nog niet bent ingelogd.</p>
        <h2>Boek een afspraak</h2>
        <form method="post" action="boeken.php">
            <!-- Choose service dropdown -->
            <label for="service_id">Kies een service:</label>
            <select name="service_id" id="service_id" required>
                <option value="">Selecteer een service</option>
                <?php foreach ($services as $service): ?>
                    <option value="<?= $service['service_id'] ?>">
                        <?= $service['servicenaam'] ?> - €<?= $service['prijs'] ?>
                    </option>
                <?php endforeach; ?> 
            </select>

            <!-- Date input -->
            <label for="datum">Kies een datum:</label>
            <input type="date" id="datum" name="datum" required>

            <!-- Time slot input -->
            <label for="tijdslot">Kies een tijdslot:</label>
            <input type="time" id="tijdslot" name="tijdslot" required>

            <!-- Location selection -->
            <label for="locatie">Locatie:</label>
            <select name="locatie" id="locatie" required>
                <?= $location_options ?>
            </select>

            <button type="submit">Boek nu</button>
        </form>
    </div>

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