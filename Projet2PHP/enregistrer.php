<?php
@include("connexion.php");

// Vérifier si le formulaire a été soumis
if (isset($_POST["login"], $_POST["motdepasse"], $_POST["fonction"])) {
    $login = $_POST["login"];
    $mdp = $_POST["motdepasse"];
    $fonction = $_POST["fonction"];

    // Requête d'insertion sans validation ni protection
    $requete = "INSERT INTO users (Login, Mdp, Fonction) 
                VALUES ('$login', '$mdp', '$fonction')";
    
    $resultat = mysqli_query($conn, $requete);

    if ($resultat) {
        echo "<center><h2>Enregistrement reussi !</h2></center>";
    } else {
        echo "<center><h2>Erreur lors de l'enregistrement.</h2></center>";
        echo "<center><h3>" . mysqli_error($conn) . "</h3></center>";
    }

    // Fermer la connexion
    echo "<center><a href='index.html'>Retour</a></center>";
    mysqli_close($conn);
} else {
    echo "<center><h2>Veuillez remplir tous les champs.</h2></center>";
}
?>
