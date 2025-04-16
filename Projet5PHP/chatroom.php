<!DOCTYPE html>
<html>
<head>
    <title></title>
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
    <div>
        <iframe src="chat.php" id="chat" name="chat" width="80%" height="400"></iframe>
    </div>
    <div>
        <form action="send.php" method="POST">
            <input type="text" name="ip" id="ip" style="display: none;">
            <textarea name="msg"></textarea>
            <input type="submit" value="send">
        </form>
    </div>
</body>
</html>
