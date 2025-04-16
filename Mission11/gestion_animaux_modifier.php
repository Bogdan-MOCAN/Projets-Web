<?php
@include("connexion.php");

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nom_animal = mysqli_real_escape_string($conn, $_POST['nom_animal']);
    $id_Especes = mysqli_real_escape_string($conn, $_POST['id_Especes']);
    $date_de_naissance = mysqli_real_escape_string($conn, $_POST['date_de_naissance']);
    $sexe = mysqli_real_escape_string($conn, $_POST['sexe']);
    $commentaire = mysqli_real_escape_string($conn, $_POST['commentaire']);

    // Mise à jour des données
    $sql = "UPDATE animaux 
            SET nom_animal = '$nom_animal', 
                id_Especes = '$id_Especes', 
                date_de_naissance = '$date_de_naissance', 
                sexe = '$sexe', 
                commentaire = '$commentaire'
            WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<center><p style='color: green;'>Animal modifié avec succès !</p></center>";
    } else {
        echo "<center><p style='color: red;'>Erreur : " . mysqli_error($conn) . "</p></center>";
    }

    // Lien retour
    echo "<center><a href='gestion_animaux_modifier_.php'>Retour</a></center>";

    // Fermer la connexion
    mysqli_close($conn);
} else {
    echo "<center><p style='color: red;'>Accès interdit</p></center>";
}
?>
