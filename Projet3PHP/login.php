<?php
session_start();
include 'connexion.php';

$login = $_POST['login'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE Login = :login AND Mdp = :password";

$stmt = $pdo->prepare($query);
$stmt->bindParam(':login', $login);
$stmt->bindParam(':password', $password);
$stmt->execute();

$result = $stmt->rowCount();

if ($result == 1) {
    $query = "SELECT Fonction FROM users WHERE Login = :login AND Mdp = :password";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        $_SESSION['Login'] = $login;
        $_SESSION['Fonction'] = $row['Fonction'];

        if ($row['Fonction'] === 'administrateur') {
            header('location: Administrateur/menu1.php');
        } elseif ($row['Fonction'] === 'adherent') {
            header('location: Adherent/menu2.php');
        } else {
            header('location: index.html');
        }
        exit();
    }
} else {
    $_SESSION['badconnecte'] = true;
    header('location: index.html');
    exit();
}
?>
