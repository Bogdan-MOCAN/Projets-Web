<?php
session_start();

echo "Bienvenue, " . $_SESSION["Login"] . " !";
echo " Vous etes connecte en tant qu'" . $_SESSION["Fonction"] . ".";

@include("../connexion.php");

try {
    // Requête pour récupérer les commandes
    $requete = "SELECT * FROM commandes";
    $stmt = $pdo->query($requete);
    $commandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Commandes</title>
</head>
<body bgcolor="#fcba03">
    <center>
    <h1>Liste des Commandes</h1>
    <table border="1">
        <tr>
            <th>ID Commande</th>
            <th>ID Client</th>
            <th>Date Commande</th>
            <th>Montant Total</th>
        </tr>
        <?php foreach ($commandes as $commande) { ?>
            <tr>
                <td><?php echo htmlspecialchars($commande["id_commande"]); ?></td>
                <td><?php echo htmlspecialchars($commande["id_client"]); ?></td>
                <td><?php echo htmlspecialchars($commande["date_commande"]); ?></td>
                <td><?php echo htmlspecialchars($commande["montant_total"]); ?> €</td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <h2>Retour au menu :</h2>
    <a href="menu2.php">Menu</a>
    </center>
</body>
</html>
