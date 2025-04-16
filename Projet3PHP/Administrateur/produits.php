<?php
session_start();
@include("../connexion.php");

try {
    // Requête sécurisée avec requête préparée
    $requete = "SELECT * FROM produits";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur SQL : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <style>
        body {
            background-color: #00ff44;
            font-family: Arial, sans-serif;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: white;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: lightgray;
        }
        img {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>

<?php
echo "<h2 style='text-align:center;'>Le nombre de produits est " . count($produits) . "</h2>";
?>

<div class="form_box">
    <div class="form_value">
        <center>
            <table>
                <tr>
                    <th>Id_produit</th>
                    <th>Nom_produit</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Disponibilité</th>
                    <th>Image</th>
                </tr>

                <?php foreach ($produits as $produit) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($produit['id_produit']); ?></td>
                    <td><?php echo htmlspecialchars($produit['nom_produit']); ?></td>
                    <td><?php echo htmlspecialchars($produit['prix']); ?> €</td>
                    <td><?php echo htmlspecialchars($produit['stock']); ?></td>
                    <td><?php echo htmlspecialchars($produit['disponibilite']); ?></td>
                    <td>
                        <?php if (!empty($produit['image'])) { ?>
                            <img src="../Images/<?php echo htmlspecialchars($produit['image']); ?>" alt="Image produit">
                        <?php } else { ?>
                            <p>Aucune image</p>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <h2>Retour au menu :</h2><a href="menu1.php">Menu</a>
        </center>
    </div>
</div>

</body>
</html>
