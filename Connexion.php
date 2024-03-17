<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $servername = "localhost";
    $db_username = "marie";
    $db_password = "juin123";
    $dbname = "examjs";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM utilisateurs WHERE username='$username' AND password='$password' AND role='$role'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        header("Location: Quizz.php");
        exit();
    } else {
        header("Location: Accueil.php");
        exit();
    }

    $conn->close();
}
?>