<?php
require_once("includes/db.php")

?>

<!DOCTYPE html>
<html lang = "en"></html>
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Inscription</h1>
    <form action="inscription.php" methode="POST">
        <div>
            <label for="nom_utilisateur">Nom d'utilisateur :</label>
            <input type="text" id="nom_utilisateur" name="nom_utilisateur" required>
        </div>

        <div>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div>
            <label for="password">Mot de asse :</label>
            <input type="password"name="password" id="password" required>
        </div>

        <div>
            <label for="password">Confirmer le mot de passe :</label>
            <input type="password"name="confirmation" id="confirmation" required>
        </div>

        <button type="submit">S'incrire</button>
    </form>

    <p>Deja inscrit ? <a href="connecion.php">Connectez vous ici</a></p>
</body>