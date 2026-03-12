<?php
require_once("includes/db.php");

//on check si le formujlaire a ete soumis
if (isset($_POST["inscription"])){

    //recuperation des donnees du formulaire et nettoiement (pour la securite)
    $nom_utilisateur = trim($_POST["nom_utilisateur"]);

    $email = trim($_POST["email"]);

    $password = trim($_POST["password"]);

    $confirmation = trim($_POST["confirmation"]);

    //validation des donnees (on verifie que tout est ok)
    $erreurs = [];

    if(empty($nom_utilisateur) || strlen($nom_utilisateur) < 3){
        $erreurs[] = "Le nom d'utilisateur doit contenir au moins 3 caracteress.";

        
    }
}



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
            <label for="password">Mot de passe :</label>
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