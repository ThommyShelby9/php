<?php
// Requête SQL pour récupérer tous les utilisateurs
$sql = "SELECT id, username, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Afficher les données de chaque utilisateur
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Nom d'utilisateur: " . $row["username"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "0 résultats";
}
?>
