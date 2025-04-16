<?php
$conn = mysqli_connect("localhost", "root", "", "chat_db");

if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

$a = mysqli_real_escape_string($conn, $_POST['id']);
$b = mysqli_real_escape_string($conn, $_POST['pass']);
$ip = mysqli_real_escape_string($conn, $_POST['ip']);

$req = "SELECT * FROM user WHERE identifiant = '$a'";
$ret = mysqli_query($conn, $req);

if (!$ret) {
    die("Requête invalide : " . mysqli_error($conn) . "\nRequête complète : " . $req);
}

$row = mysqli_fetch_assoc($ret);

if ($row && $row['password'] == $b) {
    $deleteReq = "DELETE FROM connecte WHERE ip = '$ip'";
    mysqli_query($conn, $deleteReq);

    $insertReq = "INSERT INTO connecte (username, ip) VALUES ('$a', '$ip')";
    if (!mysqli_query($conn, $insertReq)) {
        die("Erreur d'insertion dans connecte : " . mysqli_error($conn));
    }

    echo "Connexion reussie !";
    echo "<br><a href='chatroom.php' style='margin: auto; text-decoration: none; padding: 5px 10px;'>Aller au chat</a>";
} else {
    echo "Mauvais identifiant ou mot de passe";
}

mysqli_close($conn);
?>
