<!DOCTYPE html>
<html>
<head>
</head>
<body>
<table border="0">
    <?php
    header("Refresh:2");

    $conn = mysqli_connect("localhost", "root", "", "chat_db");

    if (!$conn) {
        die("Erreur de connexion : " . mysqli_connect_error());
    }

    $req = "SELECT user.identifiant, message.msg 
            FROM user 
            INNER JOIN message ON user.iduser = message.senderid 
            ORDER BY message.msgor";  

    $ret = mysqli_query($conn, $req);

    if (!$ret) {
        die("Requête invalide : " . mysqli_error($conn) . "\nRequête complète : " . $req);
    }

    echo mysqli_num_rows($ret);

    while ($row = mysqli_fetch_assoc($ret)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['identifiant']) . "</td>";
        echo "<td>- " . htmlspecialchars($row['msg']) . "</td>";
        echo "</tr>";
    }

    mysqli_close($conn);
    ?>
</table>
</body>
</html>
