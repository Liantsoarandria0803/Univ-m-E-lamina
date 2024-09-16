<?php
session_start();
if (isset($_SESSION['username'])){

  header('Content-Type: application/json');
  require "./../Database/databaseConnect.php";
    // echo "Connected successfully";
    $requete = $conn->prepare("SELECT * FROM adm");
    $requete->execute();
    $resultats = $requete->fetchAll();
    $retour["members"] = $resultats;
    echo json_encode($retour);
}
else{
  header("Location: ./../../index.php");
}
?>