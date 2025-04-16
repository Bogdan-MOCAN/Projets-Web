<?php
$conn = mysqli_connect("localhost", "root", "", "chat_db");

if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

$msg = mysqli_real_escape_string($conn, $_POST['msg']);
$ip = mysqli_real_escape_string($conn, $_POST['ip']);

$req = "SELECT user.iduser 
        FROM user 
        INNER JOIN connecte ON user.identifiant = connecte.username 
        WHERE connecte.ip = '$ip' 
        ORDER BY connecte.connectid DESC 
        LIMIT 1";

$ret = mysqli_query($conn, $req);

if (!$ret) {
    die("Requête invalide : " . mysqli_error($conn) . "\nRequête complète : " . $req);
}

$usr = null;
if ($row = mysqli_fetch_assoc($ret)) {
    $usr = $row['iduser'];
} else {
    die("Erreur : Aucun utilisateur trouvé avec cette IP.");
}

if (!$usr) {
    die("Erreur : Impossible de récupérer l'ID utilisateur.");
}

$req2 = "INSERT INTO message (msg, senderid) VALUES ('$msg', '$usr')";
$ret2 = mysqli_query($conn, $req2);

if (!$ret2) {
    die("Requête invalide : " . mysqli_error($conn) . "\nRequête complète : " . $req2);
}

mysqli_close($conn);

header('Location: chatroom.php');
exit();
?>
