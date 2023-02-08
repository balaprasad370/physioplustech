
<?php

 
$apiKey     = "u139353-860f12727cc661ceac449210"; 
$url    = "http://api.uptimerobot.com/getMonitors?apiKey=" . $apiKey . "&format=xml";

$c = curl_init($url);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
$responseXML = curl_exec($c);
curl_close($c);

$xml = simplexml_load_string($responseXML);
 
foreach($xml->monitor as $monitor) {
    echo $monitor['alltimeuptimeratio'];
}

?>