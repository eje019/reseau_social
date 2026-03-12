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

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erreurs[]= "L'addresse email n'est pas valide";
    }

    if(strlen($password)<6){
        $erreurs[] = "Votre mot de passe doit contenir au moins 6 caracteres.";
    }

    if($password !== $confirmation){
        $erreurs = "Vos mots de passes ne correspondent pas";
    }

    //verfification email existant
    if(empty($erreurs)){
        $checkUtilisateur = $pdo->prepare("SELECT id FROM utilisateurs WHERE nom_utilisateur = ? OR email = ?");
        $checkUtilisateur->execute([$nom_utilisateur, $email]);


        if ($checkUtilisateur->rowCount() > 0 ){
            $erreurs[]= "Utilisateur deja existant";
        }
    }

    //si tout est ok on l'insere dans la bdd 
    if(empty($erreurs)){
        //hachage du mot de passe (CRUCIAL)
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        //requete d'insertion preparee (pour proteger contre les injections SQL)
        $requete = $pdo->prepare("INSERT INTO utilisateurs (nom_utilisateur, email, mot_de_passe) VALUES (?, ?, ?)");

        if ($requete->execute ([$nom_utilisateur, $email, $password_hash])) {
            //succes ? on redirige vers la page de connexion avec un message 
            header("Location : conexion.php?success=1");
            exit();
        } else {
            $erreurs[] = "Erreurs lors de l'inscription. Veuillez reessayer";
        }
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