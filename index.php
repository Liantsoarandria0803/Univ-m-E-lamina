<?php
session_start();
$servername = "localhost";
$username = "liantsoa";
$password = "liantsoa08";
$database = "univ";
$table = "adm";

// Se connecter avec MySQLi
$conn = new mysqli($servername, $username, $password, $database);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $conn->real_escape_string($_POST['username']);
    $passwd = $conn->real_escape_string($_POST['password']);

    // Détecter si ce login est dans la base de données
    $sql = "SELECT * FROM $table WHERE BINARY username='$user' AND BINARY passwd='$passwd'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userId = $row['id'];
        echo $userId;

        $retour['username'] = $user;
        $retour['userId'] = $userId;
        $_SESSION['username'] = $user;

        // Sauvegarder le nom d'utilisateur dans un fichier JSON
        $fp = fopen('./data/user.json', 'w');
        fwrite($fp, json_encode($retour));
        fclose($fp);

        header("Location: ./menu.php");
        exit(); // Assurez-vous de terminer le script après redirection
    } else {
        // Gestion de l'échec de la connexion
        echo "Invalid username or password.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIV</title>
    <link rel="stylesheet" href="./front/login.css">
    <script src="./front/log.js"></script>
</head>
<body>
    <div class="body">
    <section>
        <div class="login">

            <form action="" method="post">
                   
                     <h3 class="title">UNIV</h3>
                    <label for="username">Username</label>
                    <input type="text" name="username"placeholder="USERNAME" required>
                    <label for="password">Password</label>
                    <div id="password">
                        <input id="pass"type="password" name="password" placeholder="PASSWORD" required>
                        <img id="eye" src="./img/eye.svg" alt="">
                    </div>
                   <button type="submit"><h3 style="margin: 0;">LOG IN</h3></button>
            </form>
        </div>
    </section>
    </div>
    <a href="./passForget/keySend.php" style="margin-left:40em">Mot de passe oublie</a>  
    <script src="./front/passCache.js"></script>
</body>
</html>
