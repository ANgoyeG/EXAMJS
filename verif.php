<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: Connexion.php");
    exit();
}

$servername = "localhost";
$db_username = "marie";
$db_password = "juin123";
$dbname = "examjs";
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$answers = $_POST;

$wrong_answers_count = 0;

foreach ($answers as $ID => $user_answer) {
    $sql = "SELECT correct_answer FROM questions WHERE ID = $ID";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $correct_answer = $row['correct_answer'];

        if ($user_answer != $correct_answer) {
            $wrong_answers_count++;
        }
    }
}

if ($wrong_answers_count >= 2) {
    echo "Vous avez eu deux mauvaises réponses. Voici la réponse correcte :";
    foreach ($answers as $ID => $user_answer) {
        $sql = "SELECT correct_answer FROM questions WHERE ID = $ID";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "Question $ID : " . $row['correct_answer'] . "<br>";
        }
    }
} else {
    echo "Félicitations ! Vous avez répondu correctement à toutes les questions.";
}

$conn->close();
?>
