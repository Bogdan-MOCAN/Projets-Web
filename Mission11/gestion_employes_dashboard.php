<?php
@include("connexion.php"); // Connexion à la base de données

// Nombre total d'employés (y compris directeurs)
$requete_total = "SELECT COUNT(*) AS total FROM personnels";
$resultat_total = mysqli_query($conn, $requete_total);
$nb_employes = mysqli_fetch_assoc($resultat_total)['total'];

// Nombre de directeurs uniquement
$requete_directeurs = "SELECT COUNT(*) AS total FROM personnels WHERE fonction = 'Directeur'";
$resultat_directeurs = mysqli_query($conn, $requete_directeurs);
$nb_directeurs = mysqli_fetch_assoc($resultat_directeurs)['total'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Employés</title>
    <link rel="stylesheet" href="gestion_employes.css">
    <!-- MOCAN Bogdan -->
</head>
<body>
    <div class="main-content">
        <header>
            <h1>Gestion des Employés</h1>
        </header>
        <div class="stats">
            <div class="stat-box">
                <img src="../Images/Images_mission11/Personnes_logo.png" alt="Employés">
                <h2>Total Employés</h2>
                <p><?php echo $nb_employes; ?></p> <!-- Affichage dynamique -->
            </div>
            <div class="stat-box">
                <img src="../Images/Images_mission11/Directeur_logo.png" alt="Directeurs">
                <h2>Directeurs</h2>
                <p><?php echo $nb_directeurs; ?></p> <!-- Affichage dynamique -->
            </div>
        </div>
        <div class="employee-list">
            <h2>Liste des employés</h2>
            <?php
            // Requête pour récupérer la liste des employés
            $requete = "SELECT id, nom, prenom, date_de_naissance, sexe, login, salaire, fonction FROM personnels";
            $resultat = mysqli_query($conn, $requete);
            ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Date de naissance</th>
                        <th>Sexe</th>
                        <th>Login</th>
                        <th>Salaire</th>
                        <th>Fonction</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while ($enreg = mysqli_fetch_array($resultat)) { 
                    ?>
                        <tr>
                            <td><?php echo $enreg["id"]; ?></td>    
                            <td><?php echo $enreg["nom"]; ?></td>
                            <td><?php echo $enreg["prenom"]; ?></td>
                            <td><?php echo $enreg["date_de_naissance"]; ?></td>
                            <td><?php echo $enreg["sexe"]; ?></td>
                            <td><?php echo $enreg["login"]; ?></td>
                            <td><?php echo $enreg["salaire"]; ?> €</td>
                            <td><?php echo $enreg["fonction"]; ?></td>
                            <td>
                                <a href="supprimer_employes.php?id=<?php echo $enreg['id']; ?>" class="delete-btn" onclick="return confirm('Voulez-vous vraiment supprimer cet employé ?');">🗑️ Supprimer</a>
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
