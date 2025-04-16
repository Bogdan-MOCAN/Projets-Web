<?php
@include("connexion.php");

if (!empty($_GET['id'])) {
    $id = (int) $_GET['id']; // Sécurisation de l'ID
    mysqli_query($conn, "DELETE FROM personnels WHERE id = $id");

    // Redirection après suppression
    header("Location: gestion_employes_dashboard.php");
    exit;
}

mysqli_close($conn);
?>
