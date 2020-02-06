<html>
	<head>
		<title>Set Image</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body style="background-color: #456096">


<?php

$receivedTimePeriod=$_GET['periodLength'];
$JSONContents1 = file_get_contents('/var/www/html/settings.json');
$contentsDecoded1 = json_decode($JSONContents1, true);
$contentsDecoded1['delay'] = $receivedTimePeriod;
$jsonEditComplete1 = json_encode($contentsDecoded1, JSON_NUMERIC_CHECK);
file_put_contents('/var/www/html/settings.json', $jsonEditComplete1);

$rotateIsTrue = true;
$JSONContents2 = file_get_contents('/var/www/html/settings.json');
$contentsDecoded2 = json_decode($JSONContents2, true);
$contentsDecoded2['rotating'] = $rotateIsTrue;
$jsonEditComplete2 = json_encode($contentsDecoded2);
file_put_contents('/var/www/html/settings.json', $jsonEditComplete2);

echo file_get_contents('/var/www/html/settings.json');

#echo $receivedTimePeriod;
#echo $JSONContents;
#echo $contentsDecoded;
echo $jsonEditComplete;

shell_exec("sh /var/www/html/pictureFrame.sh");

?>

<div style="position: absolute; top:50%; left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
		<i style="font-size: 400px; color: white;" class="fa fa-cogs fa-5x"></i>
	</div>	
	
	
<script language="javascript">

var r = alert("Timer Interval Changed!");
	if (r ==true) {
		location.replace('/');
	} else {
		location.replace('/');
	}

</script>


</body>
</html>