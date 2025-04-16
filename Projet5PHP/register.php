<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        var ip = "false";
        $.getJSON("https://api.ipify.org?format=json", function(data) {
            ip = (data.ip);
            document.getElementById("ip").value = ip;
        });

        function faux() {
            if(document.getElementById("p1").value == document.getElementById("p2").value) {
                document.getElementById("non").classList.add("non");
            } else {
                document.getElementById("non").classList.remove("non");
            }
        }
    </script>

<body>
    <form action="test2.php" method="post">
        <input type="text" name="ip" id="ip">

        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="id"></td>
            </tr>

            <tr>
                <td>Password:</td>
                <td><input type="password" name="pass" id="p1" onblur="faux()"></td>
            </tr>

            <tr>
                <td>Confirm password:</td>
                <td>
                    <input type="password" name="pass2" id="p2" onblur="faux()">
                    <span id="non" style="color:red; display:none;">Les deux mots de passe sont différents</span>
                </td>
            </tr>

            <tr>
                <td><input type="submit" name="Valider"></td>
            </tr>

            <tr>
                <td><input type="reset" name="Annuler"></td>
            </tr>
        </table>
    </form>
</body>

</html>