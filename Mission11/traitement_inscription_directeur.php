<?php
@include("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sécurisation des données
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
    $date_de_naissance = mysqli_real_escape_string($conn, $_POST['date_de_naissance']);
    $sexe = mysqli_real_escape_string($conn, $_POST['sexe']);
    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $salaire = mysqli_real_escape_string($conn, $_POST['salaire']);
    
    // Fonction forcée à "Directeur"
    $fonction = "Directeur";

    // Requête pour insérer l'employé dans la table `personnels`
    $requete = "INSERT INTO personnels (nom, prenom, date_de_naissance, sexe, login, password, salaire, fonction) 
                VALUES ('$nom', '$prenom', '$date_de_naissance', '$sexe', '$login', '$password', '$salaire', '$fonction')";

    if (mysqli_query($conn, $requete)) {
        header("Location: index.html"); // Redirection vers la connexion après inscription
        exit(); // Assurer que le script s'arrête après la redirection
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Accès interdit.";
}
?>
