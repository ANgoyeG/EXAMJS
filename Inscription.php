<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    $servername = "localhost"; 
    $db_username = "marie"; 
    $db_password = "juin123"; 
    $dbname = "examjs"; es

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql_check = "SELECT * FROM utilisateurs WHERE username = '$username'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo "Ce nom d'utilisateur est déjà utilisé. Veuillez en choisir un autre.";
    } else {
        $sql_insert = "INSERT INTO utilisateurs (username, password, role) VALUES ('$username', '$password', '$role')";
        if ($conn->query($sql_insert) === TRUE) {
            header("Location: Quizz.php");
            exit();
        } else {
            echo "Erreur lors de l'inscription : " . $conn->error;
        }
    }

    $conn->close();
}
?>
