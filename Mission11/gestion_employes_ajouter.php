<?php
@include("connexion.php"); // Connexion à la base de données

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sécurisation des données
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
    $date_de_naissance = mysqli_real_escape_string($conn, $_POST['date_de_naissance']);
    $sexe = mysqli_real_escape_string($conn, $_POST['sexe']);
    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $salaire = mysqli_real_escape_string($conn, $_POST['salaire']);
    $fonction = mysqli_real_escape_string($conn, $_POST['fonction']);

    // Requête SQL pour insérer les données
    $sql = "INSERT INTO personnels (nom, prenom, date_de_naissance, sexe, login, password, salaire, fonction) 
            VALUES ('$nom', '$prenom', '$date_de_naissance', '$sexe', '$login', '$password', '$salaire', '$fonction')";

    // Exécution et vérification
    if (mysqli_query($conn, $sql)) {
        echo "<center><p style='color: green;'>Employé ajouté avec succès !</p></center>";
    } else {
        echo "<center><p style='color: red;'>Erreur : " . mysqli_error($conn) . "</p></center>";
    }

    echo "<center><a href='gestion_employes_ajouter.html'>Retour</a></center>";
    mysqli_close($conn);
} else {
    echo "<center><p style='color: red;'>Accès interdit</p></center>";
}
?>
