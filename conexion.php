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

        if(!empty($identifiant) && !empty($password)){
            
        }
    }
?>
