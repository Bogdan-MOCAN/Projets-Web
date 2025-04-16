<?php
@include("../connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire en sécurisant
    $a = htmlspecialchars($_POST['nom_produit']);
    $b = htmlspecialchars($_POST['prix']);
    $c = htmlspecialchars($_POST['stock']);
    $d = htmlspecialchars($_POST['disponibilite']);

    try {
        // Requête préparée pour éviter l'injection SQL
        $req = "INSERT INTO produits (nom_produit, prix, stock, disponibilite) 
                VALUES (:nom_produit, :prix, :stock, :disponibilite)";
        
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':nom_produit', $a, PDO::PARAM_STR);
        $stmt->bindParam(':prix', $b, PDO::PARAM_STR);
        $stmt->bindParam(':stock', $c, PDO::PARAM_INT);
        $stmt->bindParam(':disponibilite', $d, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            echo "<center><p>Enregistrement effectué</p></center>";
        } else {
            echo "<center><p>Erreur lors de l'insertion</p></center>";
        }
    } catch (PDOException $e) {
        echo "<center><p>Erreur SQL : " . $e->getMessage() . "</p></center>";
    }
}

echo "<center><a href='menu2.php'>Retour au menu</a></center>";
?>
