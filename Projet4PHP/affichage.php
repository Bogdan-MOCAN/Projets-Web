<?php
include("connexion.php");

$sql = "SELECT * FROM eleves";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des élèves</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <h2>Liste des élèves</h2>
    
    <table>
        <thead>
            <tr>
                <th>Identifiant</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Niveau</th>
                <th>Commentaire</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>" . $row['identifiant'] . "</td>
                        <td>" . $row['nom'] . "</td>
                        <td>" . $row['prenom'] . "</td>
                        <td>" . $row['date_naissance'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['telephone'] . "</td>
                        <td>" . $row['adresse'] . "</td>
                        <td>" . $row['ville'] . "</td>
                        <td>" . $row['niveau'] . "</td>
                        <td>" . $row['commentaire'] . "</td>
                        <td><img src='Site_images/" . $row['photo'] . "' alt='photo'></td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='11'>Aucun eleve trouve</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Retour au menu :</h2>
    <a href="index.html">Retour</a>
</body>
</html>

<?php
mysqli_close($conn);
?>
