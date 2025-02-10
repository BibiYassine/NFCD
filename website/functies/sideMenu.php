<?php
echo '<div class="sidenav" id="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index">Home</a>
        <a href="over">Over Ons</a>
        <a href="services">Services</a>
        <a href="review">Plaats een Review</a>
        <a href="contact">Contact</a>';
        if($_SESSION['email']=="gast"){
            echo '<a href="login">Login</a>';
        }else{
            $sql = "SELECT type FROM tblklant where email = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("s", $_SESSION['email']);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if($row['type'] == "admin" || $row['type'] == "eigenaar"){
                echo '<a href="admin">AdminPanel</a>';
                echo '<a href="profile"><img src="images/prof.png" class="profile-icon" width="32" height="32" alt="Profile Icon"></a>';
                echo '<a href="logout"><img src="images/loguit.png" class="profile-icon" width="42" height="42" alt="Logout Icon"></a>';
            }
            if($row['type'] == "klant"){
                echo '<a href="afspraken">Mijn Afspraken</a>';
                echo '<a href="profile"><img src="images/prof.png" class="profile-icon" width="32" height="32" alt="Profile Icon"></a>';
                echo '<a href="logout"><img src="images/loguit.png" class="profile-icon" width="42" height="42" alt="Logout Icon"></a>';
            }
        }
echo '</div>';

echo '<span class="menu-toggle" onclick="openNav()">&#9776;</span>';
?>
