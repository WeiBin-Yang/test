<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="assets/js/js.js"></script>
</head>
<body>
    <section id="send">
        <p>send:</p>
        <form action="index.php" method="post">
            <textarea name="send_content" cols="40" rows="20" id="send_content"></textarea><br>
            <input type="submit" value="Submit"></input>
        </form>
    </section>
    <section id="receive" style="position:absolute;right:10%;top:0">
        <p>receive</p>
        <textarea cols="40" rows="20" id="receive_content" readonly></textarea>
    </section>
</body>
</html>

<?php
    if(isset($_POST["send_content"])){
        $file = fopen("send.txt","w");
        $content = $_POST["send_content"];
        fwrite($file,$content);
        fclose($file);
    }
?>
