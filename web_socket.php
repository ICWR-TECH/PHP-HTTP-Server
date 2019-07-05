<html>
<head>
<title>PHP Web Socket - Afrizal F.A</title>
<meta name="description" content="PHP Web Socket - Afrizal F.A">
<meta name="keywords" content="PHP Web Socket, ICWR-TECH, Web Socket, HTTP Socket">
<style>
    html {
        background: white;
        color: black;
    }
</style>
</head>
<center>
   <h1>PHP Web Socket - Afrizal F.A</h1>
   <form enctype="multipart/form-data" method="post">
      PORT : <input type="number" name="port" min="1025" max="65535
">
      <br><br>
      HTML :
      <br><br>
      <textarea cols="100" rows="20" name="html"></textarea>
      <br><br>
      <input type="submit" value="Socket!" name="socket">
   </form>
<?php
// PHP HTTP Socket
// Coded By Afrizal F.A - ICWR-TECH
error_reporting(0);
$d=date("r");
if($_POST['socket']) {
   $s=socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
   $server="ICWR-TECH Socket Server";
   $html=$_POST['html'];
   $p=$_POST['port'];
   if(socket_bind($s, "0.0.0.0", $p)) {
      echo "[+] Socket Running On PORT : $p";
   }
   socket_listen($s, true);
   $resp="\rHTTP/1.0 200 OK\nDate: $d;\nServer: $server;\nContent-Type: text/html;\n
$html
";
   while(true) {
      $acc=socket_accept($s);
      socket_write($acc, $resp, strlen($resp));
      socket_close($acc);
   }
}
?>
    Copyright &copy;2019 - ICWR-TECH
</center>
<html>
