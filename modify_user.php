<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_user"])) {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $email = $_POST["email"];

    // Requête SQL pour mettre à jour un utilisateur
    $sql = "UPDATE users SET username='$username', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Utilisateur mis à jour avec succès";
    } else {
        echo "Erreur lors de la mise à jour: " . $conn->error;
    }
}
?>
