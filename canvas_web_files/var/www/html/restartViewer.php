<?php

$changeToRotation=true;
$JSONContents = file_get_contents('/var/www/html/settings.json');
$contentsDecoded = json_decode($JSONContents, true);
$contentsDecoded['rotating'] = $changeToRotation;
$jsonEditComplete = json_encode($contentsDecoded, JSON_NUMERIC_CHECK);
file_put_contents('/var/www/html/settings.json', $jsonEditComplete);


shell_exec("sh /var/www/html/pictureFrame.sh");
#header('Location: http://127.0.0.1/index.php?restartViewer=true');

?>
<script language="javascript">




var r = alert("Viewer Restarted!");
	if (r ==true) {
		location.replace('/');
	} else {
		location.replace('/');
	}

</script>


?>
