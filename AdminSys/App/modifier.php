<?php
session_start();
if(isset($_SESSION['username'])){
    require './../Database/databaseConnect.php'; 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id=$_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $mail = $_POST['mail'];
        $sql = "UPDATE adm SET username='$username', passwd='$password', mail='$mail' WHERE id=$id";
        $conn->exec($sql);
            echo "Modification réussie";
            header('Location: ./welcome.php');
    }
} else {
    header("Location: ./../../index.php");
    exit(); // Assurez-vous que l'exécution se termine après la redirection
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMARTKAJY</title>
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
        #edit{
            display:none;
        }
    </style>
</head>
<body>
<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        require './../Database/databaseConnect.php'; 
        // Préparer la requête pour récupérer les informations de l'utilisateur
        $requete = $conn->prepare("SELECT username,passwd , mail FROM adm WHERE id=$id");
        $requete->execute();
        $resultats = $requete->fetchAll(PDO::FETCH_OBJ);
        $objectINfo=$resultats['0'];
        $username = $objectINfo->username;
        $password =  $objectINfo->passwd;
        $mail =  $objectINfo->mail;
    }
?>

<form action="" method="post">
    <h2>MODIFIER VOS INFORMATIONS</h2>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="username">Nom d'utilisateur:</label>
    <input type="text" name="username" placeholder="Nom d'utilisateur" value="<?php echo $username ?>" required>
    <label for="prenom">password:</label>
    <input type="text" name="password" placeholder="password" value="<?php echo $password ?>" required>
    <label for="mention">mail:</label>
    <input type="text" name="mail" placeholder="email" value="<?php echo $mail ?>" required>
    <div id="submit">
        <button type="submit">SAUVEGARDER</button>
        <button><a href="./welcome.php">ANNULER</a></button>
    </div>
</form>
</body>
</html>
