
<html>
	<head>
		<title>Deleting Image</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body style="background-color: #456096">
		<?php
		//Receive input from delete image form with picture path
		$picturePath = $_GET['name'];
		echo "$picturePath";
		//execute script that delete image with the image path 
		$output = exec('sh /var/www/html/deleteImage.sh "'.$picturePath.'"');
		//display the executed image path (useful for troubleshooting)
		echo "<pre>$output</pre>";

		?>
	<div style="position: absolute; top:50%; left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
		<i style="font-size: 400px; color: white;" class="fa fa-trash-o fa-5x"></i>
	</div>	
		<script language="javascript">
		//Alert user that the image has been deleted
		var r = alert("Image Deleted!");
			 //   if (r ==true) {
			  //          location.replace('/');
			  //  } else {
			   //         location.replace('/');
			   // }

		</script>

		<?php
		//Allows for 1 second on page before redirect back to index.php
		header("Refresh: 1; url=index.php");

		?>
</html>


