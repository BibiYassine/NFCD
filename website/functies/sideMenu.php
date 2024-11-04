<?php
echo '<div class="sidenav" id="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.php">Home</a>
        <a href="over.php">Over Ons</a>
        <a href="services.php">Services</a>
        <a href="contact.php">Contact</a>';
        if ($_SESSION['type'] == "admin" || $_SESSION['type'] == "eigenaar") {
            echo '<a href="admin.php">Admin Panel</a>';
        } 
        else if ($_SESSION['type'] == "klant") {
            echo '';
        }
        
        else {
        // Link naar login voor niet-ingelogde gebruikers
        echo '<a href="login.php">Login</a>';
        }
    
// Controleer of de gebruiker is ingelogd en wat voor type gebruiker het is
if (isset($_SESSION['type']) && ($_SESSION['type'] == "admin" || $_SESSION['type'] == "eigenaar" || $_SESSION['type'] == "klant")) {
    // Link naar profiel en uitloggen voor ingelogde gebruikers
    echo '<a href="profile.php"><img src="images/prof.png" class="profile-icon" width="32" height="32" alt="Profile Icon"></a>';
    echo '<a href="logout.php"><img src="images/loguit.png" class="profile-icon" width="32" height="32" alt="Logout Icon"></a>';
}
    // Extra link naar admin pagina voor beheerders


echo '</div>';

echo '<span class="menu-toggle" onclick="openNav()">&#9776;</span>';
?>
