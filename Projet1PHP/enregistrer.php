<?php
@include("connexion.php");

if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}

$b = $_POST["login_user"];
$c = $_POST["mdp_user"];
$d = $_POST["fonction_user"];
$e = $_POST["ville_user"];

$stmt = $conn->prepare("INSERT INTO users (login_user, mdp_user, fonction_user, ville_user) VALUES (?, ?, ?, ?)");

if ($stmt === false) {
    die("Erreur lors de la préparation de la requête : " . $conn->error);
}

$stmt->bind_param("ssss", $b, $c, $d, $e);

if ($stmt->execute()) {
    echo "<center><p>Enregistrement effectue avec succes !</p></center>";
} else {
    echo "<center><p>Erreur lors de l'enregistrement. Veuillez reessayer.</p></center>";
}

$stmt->close();
$conn->close();

header("location:index.html");


?>
