<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = "marie"; 
    $password = "juin123"; 

    if ($_POST['username'] == $username && $_POST['password'] == $password) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        header("Location: Accueil.php");
        exit;
    } else {
        $error = "Identifiants incorrects. Veuillez réessayer.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Administrateur - Quiz App</title>
</head>
<body>
    <h2>Connexion Administrateur</h2>
    <?php
    if(isset($error)) {
        echo '<p style="color: red;">' . $error . '</p>';
    }
    ?>
    <form method="post">
        <label for="username">Nom d'utilisateur:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Mot de passe:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
