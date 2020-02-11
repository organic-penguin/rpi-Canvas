<?php

$changeToRotation="/home/pi/Pictures/gettingCanvasStarted.png";
$JSONContents = file_get_contents('/var/www/html/settings.json');
$contentsDecoded = json_decode($JSONContents, true);
$contentsDecoded['rotating'] = $changeToRotation;
$jsonEditComplete = json_encode($contentsDecoded, JSON_NUMERIC_CHECK);
file_put_contents('/var/www/html/settings.json', $jsonEditComplete);


shell_exec("sh /home/pi/rpi-Canvas/gen_GettingStartedImage.sh");
shell_exec("sh /var/www/html/pictureFrame.sh");

?>
<script language="javascript">




var r = alert("Getting Started Image Being Genearted into Carousel!");
        if (r ==true) {
                location.replace('/');
        } else {
                location.replace('/');
        }

</script>


?>





