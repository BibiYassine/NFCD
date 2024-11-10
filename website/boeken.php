<?php
// Start session and include necessary files
session_start();
include 'connect.php'; // Database connection
include 'functies/sideMenu.php'; // Sidebar menu
include 'functies/functies.php'; // Additional functions


// Maintenance mode function
onderhoudsModus();

// Check if the user is logged in
if (!isset($_SESSION['klantnaam'])) {
    header("Location: login");
    exit(); // If not logged in, redirect to login page
}

// Get the logged-in user's details from tblklant using their email
$email = $_SESSION['klantnaam'];
$query = "SELECT adres, postcode, plaats FROM tblklant WHERE email = ?";
$stmt = mysqli_prepare($mysqli, $query);
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $adres, $postcode, $plaats);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

// Fetch available services from the database
$services = [];
$query = "SELECT * FROM tblservice";
$result = mysqli_query($mysqli, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $services[] = $row;
}

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form values
    $service_id = $_POST['service_id'];
    $datum = $_POST['datum'];
    $tijdslot = $_POST['tijdslot'];
    // If user chooses custom address, save it; otherwise, use the business address
    $locatie = $_POST['locatie'] === 'bedrijf' ? 'Bedrijfsadres' : $_POST['custom_address'];

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
        $insert_query = "INSERT INTO tblafspraken (email, servicenaam, datum, tijdslot, locatie) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($mysqli, $insert_query);
        mysqli_stmt_bind_param($stmt, 'sssss', $email, $services[$service_id - 1]['servicenaam'], $datum, $tijdslot, $locatie);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        echo "<p class='success'>Afspraak succesvol geboekt!</p>";
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

            <!-- Location selection (business or custom address) -->
            <label for="locatie">Locatie:</label>
            <select name="locatie" id="locatie" onchange="toggleAddressInput()" required>
                <option value="bedrijf">Bedrijfsadres</option>
                
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
        // Toggle the visibility of the custom address input
        function toggleAddressInput() {
            var locatieSelect = document.getElementById("locatie");
            var customAddress = document.getElementById("custom_address");
            customAddress.style.display = locatieSelect.value === "custom" ? "block" : "none";
        }

        AOS.init(); // Initialize animation library
    </script>

</body>
</html>
