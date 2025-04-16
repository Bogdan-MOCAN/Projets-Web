<?php
@include("connexion.php");

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
    $date_de_naissance = mysqli_real_escape_string($conn, $_POST['date_de_naissance']);
    $sexe = mysqli_real_escape_string($conn, $_POST['sexe']);
    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $salaire = mysqli_real_escape_string($conn, $_POST['salaire']);
    $fonction = mysqli_real_escape_string($conn, $_POST['fonction']);

    // Vérifier si un mot de passe a été saisi
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE personnels 
                SET nom = '$nom', 
                    prenom = '$prenom', 
                    date_de_naissance = '$date_de_naissance', 
                    sexe = '$sexe', 
                    login = '$login', 
                    password = '$password', 
                    salaire = '$salaire', 
                    fonction = '$fonction'
                WHERE id = $id";
    } else {
        $sql = "UPDATE personnels 
                SET nom = '$nom', 
                    prenom = '$prenom', 
                    date_de_naissance = '$date_de_naissance', 
                    sexe = '$sexe', 
                    login = '$login', 
                    salaire = '$salaire', 
                    fonction = '$fonction'
                WHERE id = $id";
    }

    if (mysqli_query($conn, $sql)) {
        echo "<center><p style='color: green;'>Personnel modifié avec succès !</p></center>";
    } else {
        echo "<center><p style='color: red;'>Erreur : " . mysqli_error($conn) . "</p></center>";
    }

    // Lien retour
    echo "<center><a href='gestion_employes_modifier.php'>Retour</a></center>";

    // Fermer la connexion
    mysqli_close($conn);
} else {
    echo "<center><p style='color: red;'>Accès interdit</p></center>";
}
?>
