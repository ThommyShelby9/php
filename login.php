<?php
session_start();

// Vérifie si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirige vers la page d'accueil
    exit;
}

// Traitement du formulaire de connexion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation des données
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Requête SQL pour récupérer l'utilisateur
    // Assurez-vous d'effectuer une requête préparée pour éviter les injections SQL
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    
    // Exécutez la requête avec PDO ou MySQLi et liez les paramètres

    // Vérifie si l'utilisateur existe et que le mot de passe est correct
    if ($user) {
        if (password_verify($password, $user['password'])) {
            // Authentification réussie, stockez l'identifiant de l'utilisateur dans la session
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.php"); // Redirige vers la page d'accueil
            exit;
        } else {
            $error = "Mot de passe incorrect";
        }
    } else {
        $error = "Nom d'utilisateur incorrect";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Nom d'utilisateur:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Mot de passe:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Connexion">
    </form>
</body>
</html>
