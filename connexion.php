<?php

session_start();
require_once "includes/db.php";

//si l'utilisateur est deja connecte on le redirige vers la page daccueil
if(isset($_SESSION["utilisateur_id"]))
    {
        header("Location: index.php");
    }

    $erreur = "";

    if(isset($_POST["connexion"])){
        $identifiant = trim($_POST["identifiant"]);
        $password =$_POST["password"];

        if(!empty($identifiant) && !empty($password)) {

            //on cherche l'utilisateur par son nom ou son email
            $requete = $pdo->prepare("SELECT id, nom_utilisateur, email, mot_de_passe, FROM utilisateurs WHERE nom_utilisateur = ? OR email = ? ");
            
            $requete->execute ([$identifiant, $identifiant]);

            $utilisateur = $requete->fetch();

            //si on a trouve un uyilisateur et que le mot de passe correspond 

            if ($utilisateur  && password_verify($password, $utilisateur)){

                //on enregistre les infos dans la session
                $_SESSION["utilisateur_id"] = $utilisateur["id"];
                $_SESSION["utilisateur_nom"] = $utilisateur["nom_utilisateur"];
                $_SESSION["utilisateur_email;"] = $utilisateur["email"];
    
                //on redirige vers la page d'accueil
                header("Location: index.php");
                exit();
            } 
            else {
                $erreur = "Identifiant ou mot de passe incorrect.";
            }
        } else {
            $erreur = "Veuillez remplir tous les champs.";
        }
    }

    //message de succes depuis l'inscription
        if(isset($_GET["succes"]) && $_GET["succes"] == 1){
            $succes = "Inscription reussie ! Connectez vous maintenant.";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Connexion - SmallFb</title>
</head>
<body>
    <h1>Connexion</h1>

    <?php if (isset($succes)): ?>
        <div style="color: green; border: 1px solid green; padding: 10px;"><?= htmlspecialchars($succes) ?></div>
    <?php endif; ?>

    <form action="connexion.php" method="POST">
        <div>
            <label for="identifiant">Nom d'utilisateur ou Email :</label>
            <input type="text" id="identifiant" name="identifiant">

            <label for="mot_de_passe" name="mot_de_passe">Mot de passe :</label>
            <input type="password" name="pasword" id="password">

            <button type="submit" name="connexion">Se connecter</button>
        </div>

        <p>Pas encore de compte ? <a href="inscription.php">Inscrivez vous ici</a></p>
    </form>
</body>
</html>
