<?php
@include("connexion.php"); // Connexion à la base de données

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sécurisation des données
    $nom_animal = mysqli_real_escape_string($conn, $_POST['nom_animal']);
    $id_Especes = mysqli_real_escape_string($conn, $_POST['id_Especes']);
    $date_de_naissance = mysqli_real_escape_string($conn, $_POST['date_de_naissance']);
    $sexe = mysqli_real_escape_string($conn, $_POST['sexe']);
    $commentaire = mysqli_real_escape_string($conn, $_POST['commentaire']);

    // Requête SQL pour insérer les données
    $sql = "INSERT INTO animaux (nom_animal, id_Especes, date_de_naissance, sexe, commentaire) 
            VALUES ('$nom_animal', '$id_Especes', '$date_de_naissance', '$sexe', '$commentaire')";

    // Exécution et vérification
    if (mysqli_query($conn, $sql)) {
        echo "<center><p style='color: green;'>Animal ajouté avec succès !</p></center>";
    } else {
        echo "<center><p style='color: red;'>Erreur : " . mysqli_error($conn) . "</p></center>";
    }

    echo "<center><a href='gestion_animaux_ajouter.php'>Retour</a></center>";
    mysqli_close($conn);
} else {
    echo "<center><p style='color: red;'>Accès interdit</p></center>";
}
?>
