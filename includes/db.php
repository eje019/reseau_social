<?php
$host = "localhost";

$dbname = "reseau_social";

$username = "root";

$password = "";

try {
    $pdo = new PDO("mysql:host=$host; dbname = $dbname ; charset = utf8", $username, $password );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


    echo "Connexion reussie";
}

catch (PDOException $e) {
    die("Erreur de connexion a la base de donnees : ".$e-> getMessage());
}
?>