<html>
	<head>
		<title>Set Image</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body style="background-color: #456096">


<?php
$JSONContents = file_get_contents('/var/www/html/settings.json');
$contentsDecoded = json_decode($JSONContents, true);

$receivedAlexaToggle=$_GET['alexaToggle'];
$receivedHomekitToggle=$_GET['homekitToggle'];

	if ($receivedAlexaToggle == null){
		$receivedAlexaToggle = "false";
	}else{$receivedAlexaToggle = "true";}
	if ($receivedHomekitToggle == null){
		$receivedHomekitToggle = "false";
	}else{$receivedHomekitToggle = "true";}


if ($contentsDecoded['alexa'] == $receivedAlexaToggle){
	echo("Alexa decoded is the same as received");
	}else{
	if ($receivedAlexaToggle == null){
		shell_exec("sudo killall python");
		echo("Alexa is stopping");
	} else {
		echo("Alexa is starting");
		shell_exec("sudo python /home/pi/alexa.py");
	}}
if ($contentsDecoded['homekit'] == $receivedHomekitToggle){
	echo("Homekit decoded is the same as received");
	} else {	
	if ($receivedHomekitToggle == null){
		echo("Homekit is Stopping");
		shell_exec("sudo forever stopall");
	} else {
		echo("Homekit is Starting");
		shell_exec("sudo forever start /home/pi/HAP-NodeJS/Core.js");
	}}


$contentsDecoded['alexa'] = $receivedAlexaToggle;
$contentsDecoded['homekit'] = $receivedHomekitToggle;
$jsonEditComplete = json_encode($contentsDecoded, JSON_NUMERIC_CHECK);
file_put_contents('/var/www/html/settings.json', $jsonEditComplete);

#echo file_get_contents('/var/www/html/settings.json');


#echo $receivedAlexaToggle;
#echo $receivedHomekitToggle;
#echo $receivedTimePeriod;
#echo $JSONContents;
#echo $contentsDecoded;
echo $jsonEditComplete;

shell_exec("sh /var/www/html/pictureFrame.sh");

?>


<div style="position: absolute; top:50%; left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
		<i style="font-size: 400px; color: white;" class="fa fa-floppy-o fa-5x"></i>
	</div>	

	
<script language="javascript">
  r = true
	if (r ==true) {
		location.replace('/');
	} else {
		location.replace('/');
	}
*/
</script>


</body>
</html>