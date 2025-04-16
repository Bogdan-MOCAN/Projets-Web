<?php
@include("connexion.php"); 
session_start();

$a = $_POST['login'];
$b = $_POST['motdepasse'];

$requete = "SELECT * FROM users WHERE Login = '$a' AND Mdp = '$b'";
$resultat = mysqli_query($conn, $requete);

if (mysqli_num_rows($resultat) == 1) {
    $user = mysqli_fetch_assoc($resultat);

    $_SESSION['login'] = $user['Login'];
    $_SESSION['fonction'] = $user['Fonction'];

    if ($user['Fonction'] == "administrateur") { 
        header("Location: Administrateur/menu1.php"); 
    } else {
        header("Location: Adherent/menu2.php"); 
    }
    exit();
} else {
    header("Location: index.html");
    exit();
}
?>
