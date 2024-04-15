<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_user"])) {
    $id = $_POST["id"];

    // Requête SQL pour supprimer un utilisateur
    $sql = "DELETE FROM users WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Utilisateur supprimé avec succès";
    } else {
        echo "Erreur lors de la suppression: " . $conn->error;
    }
}
?>
