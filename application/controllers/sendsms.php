<?php
$username = "923454333323";
$password = "9583";
$mobile = "923454333323";
$sender = "SenderID";
$message = "Test SMS From SendPK.com";
$url = "http://sendpk.com/api/sms.php?username=".$username."&password=".$password."&mobile=".$mobile."&sender=".urlencode($sender)."&message=".urlencode($message)." ";

$ch = curl_init();
$timeout = 30;
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
$responce = curl_exec($ch);
curl_close($ch);
/*Print Responce*/
echo $responce;
?>