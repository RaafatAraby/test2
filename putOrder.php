<?php 

$webhookContent = "ggrd";
$webhook = fopen('test.txt' , 'w');
$webhookContent .= fwrite($webhook, 'fferaf');
fclose($webhook);

?>