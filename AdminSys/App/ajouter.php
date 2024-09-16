<?php
session_start();

require '../Database/databaseConnect.php';
$table="adm";
if(isset($_SESSION['username'])){
    // Vérifier si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mail = $_POST['email'];
    // Préparer la requête SQL pour l'insertion
    $sql = "INSERT INTO $table (username, passwd, mail) VALUES ('$username','$password','$mail')";
    $conn->exec($sql);
        echo "Data saved";
        header("Location: ./welcome.php");
        exit; // Assurez-vous qu'aucun autre script n'est exécuté
}
}
else{
    header("Location: ./../index.php");
}
?>
