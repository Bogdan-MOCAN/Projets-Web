<?php
session_start();

echo "Bienvenue, " . $_SESSION["Login"] . " !";
echo " Vous etes connecte en tant qu'" . $_SESSION["Fonction"] . ".";

@include("../connexion.php");

// Vérifier si le champ "nom" a été soumis
if (!isset($_POST['nom']) || empty($_POST['nom'])) {
    echo "<p style='color:red; text-align:center;'>Nom non spécifié.</p>";
    exit;
}

$nom = $_POST['nom'];

try {
    // Requête sécurisée avec requête préparée
    $requete = "SELECT * FROM clients WHERE nom = :nom";
    $stmt = $pdo->prepare($requete);
    $stmt->execute(['nom' => $nom]);
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur SQL : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de la Recherche</title>
</head>
<body bgcolor="#00ff44">
    <center>
        <h1>Résultats de la Recherche</h1>
        <?php if (count($clients) > 0) { ?>
            <table border="1">
                <tr>
                    <th>ID Client</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Date d'inscription</th>
                </tr>
                <?php foreach ($clients as $client) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($client["id_client"]); ?></td>
                        <td><?php echo htmlspecialchars($client["nom"]); ?></td>
                        <td><?php echo htmlspecialchars($client["prenom"]); ?></td>
                        <td><?php echo htmlspecialchars($client["email"]); ?></td>
                        <td><?php echo htmlspecialchars($client["date_inscription"]); ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p>Aucun client trouvé avec ce nom.</p>
        <?php } ?>
        <br>
        <a href="nom_page.php">Retour à la recherche</a>
    </center>
</body>
</html>
