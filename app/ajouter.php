<?php
session_start();

require 'bdConnect.php';
$table="list";
if(isset($_SESSION['username'])){
    // Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $prenom = $conn->real_escape_string($_POST['prenom']);
    $mention = $conn->real_escape_string($_POST['mention']);
    $parcours = $conn->real_escape_string($_POST['parcours']);
    $age = $_POST['age'];

    // Préparer la requête SQL pour l'insertion
    $sql = $conn->prepare("INSERT INTO $table (username, prenom, mention, parcours, age) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param('ssssi', $username, $prenom, $mention, $parcours, $age);

    if ($sql->execute()) {
        header("Location: ./../front/Accueil.php");
        exit; // Assurez-vous qu'aucun autre script n'est exécuté
    } else {
        echo "Erreur lors de l'enregistrement: " . $conn->error;
    }
}
}
else{
    header("Location: ./../index.php");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSCRIPTION</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .error-message {
            color: red;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h1>Inscription</h1>
        <label for="username">Nom:</label>
        <input type="text" name="username" required>
        
        <label for="prenom">Prénom:</label>
        <input type="text" name="prenom" required>
        
        <label for="mention">Mention:</label>
        <input type="text" name="mention" required>
        
        <label for="parcours">Parcours:</label>
        <input type="text" name="parcours" required>
        
        <label for="age">Âge:</label>
        <input type="number" name="age" required>
        
        <button type="submit">ENREGISTRER</button>
    </form>
</body>
</html>
