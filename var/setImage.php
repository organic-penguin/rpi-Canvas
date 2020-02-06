
<html>
	<head>
		<title>Set Image</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body style="background-color: #456096">

		<?php
		$picturePath = $_GET['name'];
		echo "$picturePath";

		$JSONContents = file_get_contents('/var/www/html/settings.json');
		$contentsDecoded = json_decode($JSONContents, true);
		$contentsDecoded['rotating'] = $picturePath;
		$jsonEditComplete = json_encode($contentsDecoded);
		file_put_contents('/var/www/html/settings.json', $jsonEditComplete);
		
		$output = shell_exec('sh /var/www/html/setImage.sh "'.$picturePath .'"');
		echo "$output";
		?>


		<div style="position: absolute; top:50%; left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
			<i style="font-size: 400px; color: white;" class="fa fa-upload fa-5x"></i>
		</div>	

<script language="javascript">

var r = alert("Image Set!");
        if (r ==true) {
                location.replace('/');
        } else {
                location.replace('/');
        }

</script>
</body>
<html>



