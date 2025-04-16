<?php
@include("connexion.php"); // Connexion à la base de données

// Récupération du nombre total d'animaux
$requete = "SELECT COUNT(*) AS total FROM animaux";
$resultat = mysqli_query($conn, $requete);
$nb_animaux = mysqli_fetch_assoc($resultat)['total'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Zoo</title>
    <link rel="stylesheet" href="gestion.css">
    <!-- MOCAN Bogdan -->
</head>
<body>
    <div class="main-content">
        <header>
            <h1>Dashboard Zoo</h1>
        </header>
        <div class="stats">
            <div class="stat-box">
                <img src="../Images/Images_mission11/Espèces.jpg" alt="Espèces">
                <h2>Espèces</h2>
                <p>5</p>
            </div>
            <div class="stat-box">
                <img src="../Images/Images_mission11/Perroquet.webp" alt="Animaux">
                <h2>Animaux</h2>
                <p><?php echo $nb_animaux; ?></p> <!-- Affichage dynamique -->
            </div>
        </div>
        <div class="animal-list">
            <h2>Liste des animaux</h2>
            <?php
            // Requête pour récupérer la liste des animaux
            $requete = "SELECT id, nom_animal, date_de_naissance, id_Especes, sexe FROM animaux";
            $resultat = mysqli_query($conn, $requete);
            ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Date de naissance</th>
                        <th>Espèce</th>
                        <th>Sexe</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while ($enreg = mysqli_fetch_array($resultat)) { 
                    ?>
                        <tr>
                            <td><?php echo $enreg["id"]; ?></td>    
                            <td><?php echo $enreg["nom_animal"]; ?></td>
                            <td><?php echo $enreg["date_de_naissance"]; ?></td>
                            <td><?php echo $enreg["id_Especes"]; ?></td>
                            <td><?php echo $enreg["sexe"]; ?></td>
                            <td>
                                <a href="supprimer.php?id=<?php echo $enreg['id']; ?>" class="delete-btn" onclick="return confirm('Voulez-vous vraiment supprimer cet animal ?');">🗑️ Supprimer</a>
                            </td>
                        </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
            <?php
            mysqli_close($conn);
            ?>
        </div>
    </div>
</body>
</html>
