<?php
// MOCAN Bogdan
    @include("connexion.php");

    $login = $_POST['login'];   
    $password = $_POST['password'];

    $requete = "SELECT * FROM personnels WHERE login = '$login' AND password = '$password'";
    $resultat = mysqli_query($conn, $requete);
    $ligne = mysqli_fetch_assoc($resultat);

    if ($ligne) {
        if ($ligne['fonction'] == "Directeur") {
            header("Location: page_d'accueil_directeur.html");
        } else {
            header("Location: page_d'accueil_employés.html");
        }
    } else {
        header("Location: index.html");
}
?>