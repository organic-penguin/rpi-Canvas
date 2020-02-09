<html>
	<head>
		<title>Upload Image</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body >
		<?php
			
			$target_dir = "/home/pi/Pictures/";
			
			if(isset($_POST["image"]))
			{
			$data = $_POST["image"];
			$image_array_1 = explode(";", $data);
			$image_array_2 = explode(",", $image_array_1[1]);
			$data = base64_decode($image_array_2[1]);
			$imageName = time() . '.png';
			$filepath = "/home/pi/Pictures/" . $imageName;
			
			$picture = base64_encode($data);
			file_put_contents($filepath,$data);
			$target_file = $target_dir . $imageName;
			echo '<img width="100" height="100" src="data:image/jpg;base64,'. $picture .'" /></br>';
			echo '</br>';
			echo $imageName;
			echo $fileToBeUploaded;
			echo $target_file;
			}
			
					$output = shell_exec('sh /var/www/html/pictureFrame.sh');
					echo "$output";
			
		?>
	</body> </html>
