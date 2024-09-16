document.getElementById("ajouter").innerHTML=`
<form action="./ajouter.php" method="post">
        <h1>Inscription</h1>
        <label for="username">username:</label>
        <input type="text" name="username" required>
        
        <label for="password">password:</label>
        <input type="text" name="password" required>
        
        <label for="email">email:</label>
        <input type="mail" name="email" required>
        
        <button type="submit">ENREGISTRER</button>
    </form>
`