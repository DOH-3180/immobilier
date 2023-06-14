<?php
require('../config.php');

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Liste des utilisateurs connectés :</h2>";
    echo "<ul>";
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>".$row['username']."</li>";
    }
    
    echo "</ul>";
} else {
    echo "Aucun utilisateur connecté.";
}

mysqli_close($conn);
?>
