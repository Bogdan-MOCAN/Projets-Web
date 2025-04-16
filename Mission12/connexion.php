<?php
$host = "localhost"; // Adresse du serveur
$dbname = "site_actualites"; // Nom de la base de données
$username = "root"; // Nom d'utilisateur MySQL
$password = ""; // Mot de passe MySQL

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Affiche les erreurs SQL
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Récupération des données en tableau associatif
        PDO::ATTR_EMULATE_PREPARES => false // Désactivation de l'émulation des requêtes préparées
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
