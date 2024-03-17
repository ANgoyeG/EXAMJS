<?php
session_start();

if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $servername = "localhost";
    $db_username = "marie";
    $db_password = "juin123";
    $dbname = "examjs";
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM questions";
    $result = $conn->query($sql);

    $questions = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $questions[] = $row;
        }
    }

    $conn->close();

} else {
    header("Location: Connexion.php");
    exit();
}
?>
