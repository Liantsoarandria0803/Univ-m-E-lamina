<?php
    session_start();
    if(isset($_SESSION['username'])){
        echo '<h2>Bienvenue  :' . $_SESSION['username'] . '</h2>';
    }
    else{
        header("Location: ./../../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

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

    </style>
</head>
<body>
    <h1>Ajouter un admin</h1>
    <div id="ajouter">

    </div>
    <h1>LISTE DES UTILISATEURS</h1>
    <div id="table">
        <table border="1" id="list">
        </table>
    </div>
    <button id="deconnexion"><a href="./../../menu.php">retour vers le menu</a></button>
    <script src="./../script/affiche.js"></script>
    <script src="./../script/ajouter.js"></script>
</body>
</html>