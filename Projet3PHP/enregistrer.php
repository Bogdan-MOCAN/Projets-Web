<?php

include 'connexion.php';

$login = $_POST ['login'];
$password = $_POST ['password'];
$fonction = $_POST ['fonction'];

$query = "SELECT * FROM users WHERE Login = :login";

$stmt = $pdo->prepare($query);
$stmt->bindParam(':login' , $login);
$stmt->execute();

$num_rows = $stmt->rowCount();
echo $num_rows;

if($num_rows == 0){
    $query = "INSERT INTO users (Login, Mdp, Fonction) VALUES (:login, :password, :fonction);";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':login' , $login);
    $stmt->bindParam(':password' , $password);
    $stmt->bindParam(':fonction' , $fonction);
    $Cstmt = $stmt->execute();

    if($Cstmt){
        echo "<h1> Utilisateur créé </h1>";
        header("location:index.html");
    }
    else{
        echo $query;
        echo "<h1> Erreur </h1>";
    }
}else{
    header("location:index.php?failedAdd=true");
}

?>
