<?php
session_start();
if(isset($_SESSION['username'])){
    
}
else{
    header("Location: ./index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Univ mE-LAMINA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        #title {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        #option {
            display: flex;
            justify-content: space-around;
            margin-bottom: 15em;
        }

        #option a {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        #option a:hover {
            background-color: #0056b3;
        }

        button {
            background-color: #ff4d4d;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button a {
            text-decoration: none;
            color: white;
        }

        button:hover {
            background-color: #cc0000;
        }
        </style>
</head>
<body>
    <h2 >Bienvenue <?php echo $_SESSION['username'];?></h2>
    <h1 style="margin-left:40vw ;margin-bottom:6em">UNIV mE-LAMINA</h1>
    <div id="option">
        
        <a href="./AdminSys/App/welcome.php">GERER LES ADMINISTRATEURS</a>
        <a href="./front/Accueil.php">GERER LES ETUDIANTS</a>
    </div>
    <button><a href="./deconnexion.php">Deconnexion</a></button>
</body>
</html>