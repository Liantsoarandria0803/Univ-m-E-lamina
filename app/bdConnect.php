<?php
    $servername = "localhost";
    $username = "liantsoa"; // utilisateur MySQL
    $password = "liantsoa08"; // mot de passe MySQL
    $databasename = "univ"; // nom de la base de données

    // Connexion à MySQL avec mysqli
    $conn = new mysqli($servername, $username, $password, $databasename);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>