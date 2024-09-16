<?php
session_start();
if(isset($_SESSION['username'])){

}
else{
    header('Location: ./../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des élèves</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        #table {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        td a {
            text-decoration: none;
            color: #fff;
        }

        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button a {
            text-decoration: none;
            color: white;
        }

        button:hover {
            background-color: #0056b3;
        }

        img {
            width: 16px;
            height: 16px;
        }

        .button-container {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: inline-block;
            margin: 0;
        }
        #edit{
            background-color:green;
        }
        #delete{
            background-color:red;
        }
    </style>
</head>
<body>
    <h1>LISTE DES ELEVES</h1>
    <div id="table">
        <table border="1" id="list">
        </table>
    </div>
    <div class="button-container">
        <button><a href="./../app/ajouter.php">ADD</a></button>
        <button><a href="./../menu.php">retour vers le menu</a></button>
    </div>
    <script src="Listuser.js"></script>
</body>
</html>
