<?php
include('config.php');

if (isset($_POST['ID'])) {
    $playerId = mysqli_real_escape_string($conn, $_POST['ID']);
    
    $sql = "DELETE FROM utilisateurs WHERE id = $ID";

    if ($conn->query($sql) === TRUE) {
        echo "Le joueur a été supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du joueur : " . $conn->error;
    }
} else {
    echo "ID du joueur non spécifié.";
}

$conn->close();
?>
