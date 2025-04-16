<!DOCTYPE html>
<html>
    <head>
        <title>Connexion</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript">
            var ip = false;
            $.getJSON("https://api.ipify.org?format=json", function(data) {
                ip = (data.ip);
                document.getElementById("ip").value = ip;
            });
        </script>
    </head>
    <body>
        <form action="test.php" method="post">
            <input type="text" name="ip" id="ip">
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="id"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="pass"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="Confirmer"></td>
                    <td><input type="reset" name="Annuler"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
