<?php
session_start();
if(isset($_SESSION['username'])){
    $servername = "localhost";
    $username = "liantsoa"; // utilisateur MySQL
    $password = "liantsoa08"; // mot de passe MySQL
    $databasename = "univ"; // nom de la base de données

    $conn = new mysqli($servername, $username, $password, $databasename);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Vérifier si la requête est un POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Récupérer l'ID de l'utilisateur à supprimer
        $id = $_POST['id'];

        // Préparer la requête pour supprimer l'utilisateur de la table 'list'
        $stmt = $conn->prepare("DELETE FROM list WHERE id = ?");
        $stmt->bind_param("i", $id); // "i" signifie que le paramètre est un entier (integer)

        if ($stmt->execute()) {
            // Redirection après la suppression
            header('Location: ./../front/Accueil.php');
        } else {
            echo "Erreur lors de la suppression: " . $stmt->error;
        }

        // Fermer la requête
        $stmt->close();
    }

    // Fermer la connexion
    $conn->close();
} else {
    header('Location: ./../index.php');
}
?>
