<?php

// var_dump($_POST);


// require_once("includes/db.php");

// //on check si le formujlaire a ete soumis
// if (isset($_POST["inscription"])){

//     //recuperation des donnees du formulaire et nettoiement (pour la securite)
//     $nom_utilisateur = trim($_POST["nom_utilisateur"]);

//     $email = trim($_POST["email"]);

//     $password = trim($_POST["password"]);

//     $confirmation = trim($_POST["confirmation"]);

//     //validation des donnees (on verifie que tout est ok)
//     $erreurs = [];

//     if(empty($nom_utilisateur) || strlen($nom_utilisateur) < 3){
//         $erreurs[] = "Le nom d'utilisateur doit contenir au moins 3 caracteress.";

//     }

//     if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
//         $erreurs[]= "L'addresse email n'est pas valide";
//     }

//     if(strlen($password)<6){
//         $erreurs[] = "Votre mot de passe doit contenir au moins 6 caracteres.";
//     }

//     if($password !== $confirmation){
//         $erreurs = "Vos mots de passes ne correspondent pas";
//     }

//     //verfification email existant
//     if(empty($erreurs)){
//         $checkUtilisateur = $pdo->prepare("SELECT id FROM utilisateurs WHERE nom_utilisateur = ? OR email = ?");
//         $checkUtilisateur->execute([$nom_utilisateur, $email]);


//         if ($checkUtilisateur->rowCount() > 0 ){
//             $erreurs[]= "Utilisateur deja existant";
//         }
//     }

//     //si tout est ok on l'insere dans la bdd 
//     if(empty($erreurs)){
//         //hachage du mot de passe (CRUCIAL)
//         $password_hash = password_hash($password, PASSWORD_DEFAULT);

//         //requete d'insertion preparee (pour proteger contre les injections SQL)
//         $requete = $pdo->prepare("INSERT INTO utilisateurs (nom_utilisateur, email, mot_de_passe) VALUES (?, ?, ?)");

//         if ($requete->execute ([$nom_utilisateur, $email, $password_hash])) {
//             //succes ? on redirige vers la page de connexion avec un message 
//             header("Location : conexion.php?success=1");
//             exit();
//         } else {
//             $erreurs[] = "Erreurs lors de l'inscription. Veuillez reessayer";
//         }
//     }

//     //si on arrive ici il y a des erreurs 
//     //on vas le afficher dans le HTML

// }


if(isset($_POST["inscription"])) {
    $nom = $_POST["nom_utilisateur"];
    $email = $_POST["email"];
    $mot_de_passe=["mot_de_passe"];
    $confirmation = ["confirmation"];

    // if(empty($nom)){
    //     echo "Le nom d'utilisateur est vide";
    // }

    // if(empty($email)){
    //     echo "Le mail est vide !";
    // }

    if (empty($nom) || empty($email) || empty($mot_de_passe) || empty($confirmation)){
        echo "Tous les champs doivent etre remplis";
    }
}

?>

<!DOCTYPE html>
<html lang = "en"></html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription sur SmallFb</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Inscription</h1>

    <form method="POST" action="inscription.php">
        <input type="text" name="nom_utilisateur">
        <input type="email" name="email">
        <input type="password" name="mot_de_passe">
        <input type="password" name="confirmation">
        <button type="submit" name="inscription">S'inscrire</button>
    </form>

    <p>Deja inscrit ? <a href="connexion.php">Connectez vous ici</a></p>
</body>