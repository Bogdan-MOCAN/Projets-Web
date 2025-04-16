<?php
    @include("connexion.php");

    $a=$_POST["login"];
    $b=$_POST["mdp"];

    $requete="SELECT * from users where login_user='$a' and mdp_user='$b'";
    $resultat=mysqli_query($conn, $requete);

    $ligne=mysqli_num_rows($resultat);

    if ($ligne==1)
        header("location:menu.html");
    else
        header("location:userfail.html");
?>