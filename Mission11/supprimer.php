<?php
@include("connexion.php");

if (!empty($_GET['id'])) {
    $id = (int) $_GET['id']; // Sécurisation de l'ID
    mysqli_query($conn, "DELETE FROM animaux WHERE id = $id");
    
    // Redirection immédiate pour rafraîchir la page
    header("Location: gestion_animaux_dashboard.php");
    exit;
}

mysqli_close($conn);
?>
