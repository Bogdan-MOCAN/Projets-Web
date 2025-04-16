<?php
$conn = mysqli_connect("localhost", "root", "", "chat_db");

if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}

$a = mysqli_real_escape_string($conn, $_POST['id']);
$b = mysqli_real_escape_string($conn, $_POST['pass']);
$c = mysqli_real_escape_string($conn, $_POST['pass2']);
$ip = mysqli_real_escape_string($conn, $_POST['ip']);

if ($b !== $c) {
    die("Les mots de passe ne correspondent pas.");
}

$check = 0;
$req = "SELECT * FROM user WHERE identifiant = '$a'";
$ret = mysqli_query($conn, $req);

if (!$ret) {
    die("Requête invalide : " . mysqli_error($conn) . "\nRequête complète : " . $req);
}

if ($ret && mysqli_num_rows($ret) > 0) {
    $check = 1;
}

if ($check == 0) {
    $insert_query = "INSERT INTO user (identifiant, password) VALUES ('$a', '$b')";
    if (mysqli_query($conn, $insert_query)) {
        echo "Inscription reussie.";
        echo "<br>";
        echo $ip;
        echo "<br><a href='chatroom.php' style='margin: auto; text-decoration: none; padding: 5px 10px;'>Aller au chat</a>";
    } else {
        die("Erreur lors de l'inscription : " . mysqli_error($conn));
    }
} else {
    echo "Identifiant deja utilise.";
}

mysqli_close($conn);
?>
