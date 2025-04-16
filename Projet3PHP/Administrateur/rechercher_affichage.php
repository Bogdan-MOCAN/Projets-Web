<?php
session_start();
@include("../connexion.php");

echo "Bienvenue, " . $_SESSION["Login"] . " !";
echo " Vous êtes connecté en tant qu'" . $_SESSION["Fonction"] . "'.";

// Vérifier si un id_produit a été soumis
if (isset($_POST['id_produit']) && !empty($_POST['id_produit'])) {
    $id_produit = $_POST['id_produit'];

    try {
        // Requête sécurisée avec une requête préparée
        $requete = "SELECT * FROM produits WHERE id_produit = :id_produit";
        $stmt = $pdo->prepare($requete);
        $stmt->execute(['id_produit' => $id_produit]);
        $produit = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($produit) {
?>
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <title>Détails du Produit</title>
            </head>
            <body bgcolor="#00ff44">
                <table border="1" align="center">
                    <tr>
                        <th>ID Produit</th>
                        <th>Nom Produit</th>
                        <th>Prix</th>
                        <th>Stock</th>
                        <th>Disponibilité</th>
                    </tr>
                    <tr>
                        <td><?php echo htmlspecialchars($produit['id_produit']); ?></td>
                        <td><?php echo htmlspecialchars($produit['nom_produit']); ?></td>
                        <td><?php echo htmlspecialchars($produit['prix']); ?></td>
                        <td><?php echo htmlspecialchars($produit['stock']); ?></td>
                        <td><?php echo htmlspecialchars($produit['disponibilite']); ?></td>
                    </tr>
                </table>
                <br>
                <center><a href="rechercher_selection.php">Retour</a></center>
            </body>
            </html>
<?php
        } else {
            echo "<p style='color:red; text-align:center;'>Aucun produit trouvé pour l'ID donné.</p>";
        }
    } catch (PDOException $e) {
        die("Erreur SQL : " . $e->getMessage());
    }
} else {
    echo "<p style='color:red; text-align:center;'>Veuillez sélectionner un produit.</p>";
}

?>
