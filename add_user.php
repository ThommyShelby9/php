<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_user"])) {
    // Validation des données du formulaire
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Requête SQL pour insérer un nouvel utilisateur
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouvel utilisateur ajouté avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}
?>
