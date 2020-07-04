<?php

error_reporting(0);
set_time_limit(0);

if(!empty($_POST['host']) && !empty($_POST['port']) && !empty($_POST['content'])) {

    $s = socket_create(AF_INET, SOCK_STREAM, 0);
    $headers = "HTTP/1.1 200 OK\r\n";
    $headers .= "Date: " . date("r") . "\r\n";
    $headers .= "Server: PHP HTTP Server ( R&D ICWR )\r\n";
    $headers .= "Content-Type: text/html\r\n";
    $headers .= "Content-Length: " . strlen($_POST['content']) . "\r\n";
    $headers .= "Connection: keep-alive\r\n\r\n";
    $headers .= $_POST['content'];

    if(socket_bind($s, $_POST['host'], $_POST['port'])) {

        while(true) {

            socket_listen($s);
            $accept = socket_accept($s);
            socket_write($accept, $headers , strlen($headers));
            socket_close($accept);


        }

    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP HTTP Server ( R&D ICWR )</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="text-align: center;">
    <h1>PHP HTTP Server ( R&D ICWR )</h1>
    Socket Function : <?php if(function_exists("socket_create") && function_exists("socket_bind")) { echo "ON"; } else { echo "OFF"; } ?>
    <br><br>
    <form enctype="multipart/form-data" method="post">
        HOST : <input type="text" name="host">
        <br><br>
        PORT <input type="number" name="port">
        <br><br>
        <textarea style="width: 50%;" rows="15" name="content"></textarea>
        <br><br>
        <input type="submit" value="Run Server">
    </form>
</body>
</html>
