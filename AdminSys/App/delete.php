<?php
session_start();
if(isset($_SESSION['username'])){
   require './../Database/databaseConnect.php';
    // Vérifier si la requête est un POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Récupérer l'ID de l'utilisateur à supprimer
        $id = $_POST['id'];

        // Préparer la requête pour supprimer l'utilisateur de la table 'list'
        $stmt = "DELETE FROM adm WHERE id = '$id'";
        $conn->exec($stmt);
            // Redirection après la suppression
            header('Location: welcome.php');

        // Fermer la requête
        $stmt->close();
    }

    // Fermer la connexion
    $conn->close();
} else {
    header("Location: ./../../index.php");
}
?>
