<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "liantsoa";
$password = "liantsoa08";
$database = "univ";
session_start();

// Se connecter avec MySQLi
$conn = new mysqli($servername, $username, $password, $database);

$retour = array();

if(isset($_SESSION['username'])){
    // Vérifier la connexion
    if ($conn->connect_error) {
        $retour["error"] = "Connection failed: " . $conn->connect_error;
        echo json_encode($retour);
        exit;
    }

    try {
        // Préparer et exécuter la requête SQL
        $sql = "SELECT * FROM list";
        $result = $conn->query($sql);
    
        // Vérifier si la requête retourne des résultats
        if ($result->num_rows > 0) {
            // Stocker les résultats dans un tableau associatif
            while($row = $result->fetch_assoc()) {
                $retour["members"][] = $row;
            }
        } else {
            $retour["members"] = [];
        }
    } catch(Exception $e) {
        $retour["error"] = "Connection failed: " . $e->getMessage();
    }
} else {
    $retour["error"] = "Unauthorized access";
    header("Location: ./../index.php");
    exit;
}

$conn->close();

// Envoyer la réponse JSON
echo json_encode($retour);
?>
