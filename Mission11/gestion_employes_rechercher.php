<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher un Employé</title>
    <link rel="stylesheet" href="rechercher_employes.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .main-content {
            width: 100%;
            max-width: 800px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .search-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .search-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            text-align: center;
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            width: 100%;
            max-width: 400px;
        }

        .search-box input {
            flex: 1;
            border: none;
            outline: none;
            font-size: 1rem;
            background-color: transparent;
        }

        .search-btn-container {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .search-btn {
            width: 100%;
            max-width: 200px;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-btn:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        table th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="search-container">
            <div class="search-title">Rechercher un Employé</div>
            <form method="POST">
                <div class="search-box">
                    <span class="search-icon">🔍</span>
                    <input type="text" id="search-input" name="search_query" placeholder="Entrez un nom ou un ID">
                </div>
                <div class="search-btn-container">
                    <button type="submit" class="search-btn">Rechercher</button>
                </div>
            </form>
        </div>

        <?php
        @include("connexion.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['search_query'])) {
            $search_query = mysqli_real_escape_string($conn, $_POST['search_query']);
            $sql = "SELECT id, nom, prenom, date_de_naissance, sexe, fonction, salaire FROM personnels 
                    WHERE id LIKE '%$search_query%' 
                    OR nom LIKE '%$search_query%' 
                    OR prenom LIKE '%$search_query%'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de naissance</th>
                                <th>Sexe</th>
                                <th>Fonction</th>
                                <th>Salaire</th>
                            </tr>
                        </thead>
                        <tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['nom'] . "</td>
                            <td>" . $row['prenom'] . "</td>
                            <td>" . $row['date_de_naissance'] . "</td>
                            <td>" . $row['sexe'] . "</td>
                            <td>" . $row['fonction'] . "</td>
                            <td>" . $row['salaire'] . "</td>
                          </tr>";
                }
                echo "</tbody>
                      </table>";
            } else {
                echo "<p style='color: red; text-align: center;'>Aucun employé trouvé avec cette recherche.</p>";
            }
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<p style='color: red; text-align: center;'>Veuillez entrer un critère de recherche.</p>";
        }
        ?>
    </div>
</body>
</html>
