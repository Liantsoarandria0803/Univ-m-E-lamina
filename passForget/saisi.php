<?php
session_start();
require './../AdminSys/Database/databaseConnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mail = $_SESSION['mail'];
    $password = $_POST['password'];
    
    // Utilisation de requêtes préparées pour éviter les injections SQL
    $sql = $conn->prepare("UPDATE adm SET passwd = :password WHERE mail = :mail");
    $sql->bindParam(':password', $password);
    $sql->bindParam(':mail', $mail);
    $sql->execute();
    
    echo "<p style='color:green;'>Mot de passe changé avec succès</p>";

    $sql2 = $conn->prepare("SELECT username FROM adm WHERE mail = :mail");
    $sql2->bindParam(':mail', $mail);
    $sql2->execute();
    $resultats = $sql2->fetchAll(PDO::FETCH_OBJ);
    $_SESSION['username'] = $resultats[0]->username;

    header('Location: ./../menu.php');
    exit(); // Assure-toi que le script s'arrête après redirection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialiser Mot de Passe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-size: 16px;
            margin-bottom: 10px;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 20px;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Réinitialiser votre mot de passe</h1>
        <form action="" method="post">
            <label for="password">Nouveau mot de passe:</label>
            <input type="text" name="password" id="password" required>
            <button type="submit">Changer le mot de passe</button>
        </form>
    </div>
</body>
</html>
