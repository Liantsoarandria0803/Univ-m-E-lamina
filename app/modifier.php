<?php
session_start();
if(isset($_SESSION['username'])){
    require 'bdConnect.php'; 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $prenom = $_POST['prenom'];
        $mention = $_POST['mention'];
        $parcours = $_POST['parcours'];
        $age = $_POST['age'];
        $id = $_POST['id'];

        // Préparer la requête pour éviter l'injection SQL
        $sql = "UPDATE list SET username=?, prenom=?, mention=?, parcours=?, age=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        
        // Correction dans bind_param pour correspondre aux types des colonnes (age -> 'i', id -> 'i')
        $stmt->bind_param('ssssii', $username, $prenom, $mention, $parcours, $age, $id);

        if ($stmt->execute()) {
            echo "Modification réussie";
            header('Location: ./../front/Accueil.php');
            exit(); // Assurez-vous que l'exécution se termine après la redirection
        } else {
            echo "Erreur lors de la mise à jour: " . $stmt->error;
        }

        $stmt->close();
    }
} else {
    header("Location: ./../index.php");
    exit(); // Assurez-vous que l'exécution se termine après la redirection
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMARTKAJY</title>
    <link rel="stylesheet" href="./front/updateList.css">
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

        // Connexion à MySQL
        $conn = new mysqli($servername, $username, $password, $databasename);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Préparer la requête pour récupérer les informations de l'utilisateur
        $requete = $conn->prepare("SELECT username, prenom, mention, parcours, age FROM list WHERE id=?");
        $requete->bind_param("i", $id);
        $requete->execute();
        $resultats = $requete->get_result()->fetch_assoc();

        $username = $resultats['username'];
        $prenom = $resultats['prenom'];
        $mention = $resultats['mention'];
        $parcours = $resultats['parcours'];
        $age = $resultats['age'];

        $requete->close();
        $conn->close();
    }
?>

<form action="" method="post">
    <h2>MODIFIER VOS INFORMATIONS</h2>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="username">Nom d'utilisateur:</label>
    <input type="text" name="username" placeholder="Nom d'utilisateur" value="<?php echo $username ?>" required>
    <label for="prenom">Prénom:</label>
    <input type="text" name="prenom" placeholder="Prénom" value="<?php echo $prenom ?>" required>
    <label for="mention">Mention:</label>
    <input type="text" name="mention" placeholder="Mention" value="<?php echo $mention ?>" required>
    <label for="parcours">Parcours:</label>
    <input type="text" name="parcours" placeholder="Parcours" value="<?php echo $parcours ?>" required>
    <label for="age">Age:</label>
    <input type="number" name="age" placeholder="Age" value="<?php echo $age; ?>" required>
    <div id="submit">
        <button type="submit">SAUVEGARDER</button>
        <button><a href="./../front/Accueil.php">ANNULER</a></button>
    </div>
</form>
</body>
</html>
