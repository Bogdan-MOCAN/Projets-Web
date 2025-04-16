<?php
@include("connexion.php");
$a = $_POST["Reference"];
$b = $_POST["Nbre_pages"];
$c = $_POST["#ID_Auteur"];
$d = $_POST["Date_publication"];
$e = $_POST["Genre"];
$f = $_POST["Disponibilite"];
$g = $_POST["Nbre_emprunts"];
$h = $_POST["Etat"];
$i = $_POST["Nbre_exemplaire"];

$reql = "INSERT INTO livres VALUES ('$a','$b','$c','$d','$e','$f','$g','$h','$i')";
$rl = mysqli_query($conn, $reql);

echo "<center><p>Enregistement effectue</p></center>";
echo '<center><a href="index.html">Retour</a></center>';

mysqli_close($conn)

?>