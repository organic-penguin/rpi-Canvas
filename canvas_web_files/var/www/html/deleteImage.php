
<html>
	<head>
		<title>Deleting Image</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body style="background-color: #456096">
		<?php
		$picturePath = $_GET['name'];
		echo "$picturePath";

		$output = exec('sh /var/www/html/deleteImage.sh "'.$picturePath.'"');
		echo "<pre>$output</pre>";

		?>
	<div style="position: absolute; top:50%; left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
		<i style="font-size: 400px; color: white;" class="fa fa-trash-o fa-5x"></i>
	</div>	
		<script language="javascript">

		var r = alert("Image Deleted!");
			 //   if (r ==true) {
			  //          location.replace('/');
			  //  } else {
			   //         location.replace('/');
			   // }

		</script>

		<?php

		header("Refresh: 1; url=index.php");

		?>
</html>


