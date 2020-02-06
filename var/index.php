 <!DOCTYPE html>
<html>
  <head>
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta name="apple-mobile-web-app-capable" content="yes">
     <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, user-scalable=no">
     <!-- iPhone WEb App Conversion -->
     <link rel="apple-touch-icon" href="splashscreens/digitalCanvas.png"  >
	<link href="splashscreens/iphone5_splash.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
	<link href="splashscreens/iphone6_splash.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
	<link href="splashscreens/iphoneplus_splash.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
	<link href="splashscreens/iphonex_splash.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
	<link href="splashscreens/ipad_splash.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
	<link href="splashscreens/ipadpro1_splash.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
	<link href="splashscreens/ipadpro2_splash.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="croppie/croppie.css" rel="stylesheet"/>
    <link href="croppie/sweetalert.css" rel="stylesheet"/>
    <link href="croppie/style.css" rel="stylesheet"/>
	<meta name="apple-mobile-web-app-title" content="Canvas">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<link rel="manifest" href="/manifest.json">

     <title>Canvas</title> 

	 <style type="text/css">
		.navv{
			border-radius: 15px 15px 0px 0px;
		}
	  
     </style> 
	 
  </head>


  



<body style="background-color: #f2f2f2; -webkit-user-select: none; -webkit-touch-callout: none; line-height: 1;">

      <!-- Navbar -->
	  	<div id="navbarBackground"  class="w3-top" align="center" style="display:none; background-color: black;">Canvas</div>
		<div id="navbar"  class="w3-top" align="center" style="padding: 5px; height: 30px; background-color: #456096; color:white; ">Canvas</div>

		

<div id="uploadBAR" class="w3-round-large w3-card" style="padding-top: 10px; padding-bottom: 10px; background-color: #fcfcfc; margin-top:40px; margin-bottom: 10px; margin-left: 5px; margin-right: 5px; box-shadow: 0 4px 8px 3px rgba(0, 0, 0, 0.2);" >
	<div id="uploadButtonsDiv" style="display: block; text-align: center;">
	<!--if this stops working surround the file input in a div that has a class of 'action' -->
    <input type="file" class="w3-center w3-button  w3-round-xlarge file-btn" style="text-align:center; color: white; background-color: #456096; margin:1px; margin-left: 5px; margin-top: 2px; display: inline" onClick="document.getElementById('croppieResultModal').style.display='block'" id="upload" value="Choose a file" accept="image/*" />    
	</br>
	<div style="padding-top: 15px">
	<input id="resetCAROUSEL" class="w3-button w3-round-xlarge" style="text-align:center; color: white; background-color: #456096; margin:1px; margin-top: 0px" type="submit" form="resetCarouselForm" value="Reset Carousel">
	<button id="showEditButton" class="w3-button  w3-round-xlarge" style="text-align:center; color: white; background-color: #456096; display: inline; margin-top: 0px; margin-right: 10px; width: 50px"  onClick="openEdit()"><i class="fa fa-cogs"></i></button>
	</div>
	</div>
	  
	<form id="changePeriodForm" style="text-align:center; width: 95wv; margin-left: 5px; margin-top: 4px; display:none" action="changePeriod.php" method="GET" >
		Rotation Period:
		<input id="periodLength" class="w3-center w3-round-xlarge" style="width: 80wv; display: inline; margin-left: 4px; margin:2px;" type="number" name="periodLength" id="periodLength">
	</form>
	<div id="editButtonDiv" style="display: none; text-align:center;">
	<input id="periodSubmit" class="w3-button  w3-round-xlarge" style="color: white; background-color: #456096; margin-left: 5px; margin-top: 15px; height: 38px; display: inline" type="submit" form="changePeriodForm" value="Submit" name="submit">
	<button id="advancedSettingsButton" class="w3-button  w3-round-xlarge" style="color: black; background-color: yellow; margin-left: 5px; margin-top: 15px; height: 38px; display: inline"><a style="text-decoration: none" href="/advancedSettings">Advanced</a></button>
	<button id="hideEditButton" class="w3-button  w3-round-xlarge w3-red" style="color: white; display: inline; margin: 20px 10px 2px 2px; width: 50px" onClick="closeEdit()"><i class="fa fa-close"></i></button>
	</div>
	
	<form id="resetCarouselForm"style="text-align:center; display: inline" action="restartViewer.php">
		
	</form>

  </div>


<div id="croppieResultModal" class="w3-modal">
		<div class="w3-modal-content w3-round-xlarge" style="height: 500px">
			<div class="container">
			<div class="w3-center upload-demo-wrap">
				<div id="upload-demo"></div>
				<button class="w3-center upload-result" id="croppieResultButton" onClick="croppieResultsLoading()">Result</button>
				<button style="display:none; background-color: yellow; color:black" class="w3-center" id="croppieResultLoading"><i class="fa fa-circle-o-notch fa-spin"></i> Results Loading</button>
				<button class="w3-center w3-red"><a style="text-decoration:none" href="/">Close</a></button>
			</div>
		</div>	
	</div>
	</div>



<div style="margin-top: 20px" class="w3-center" id="photoPane">
<?php
$files = array_reverse(glob("/home/pi/Pictures/*.*"));


for ($i=0; $i<count($files); $i++) {
    $image = $files[$i];
    $style = "height:90%; width:90%; box-shadow: 0 4px 8px 3px rgba(0, 0, 0, 0.2);";
    $w3class = "w3-center";
    echo '<div id="'.$image .'" >';
    echo '<form action="setImage.php" method="get">';
    echo '<input hidden="true" type="text" name="name" value="'.$image .'">';
    echo '<input style="'.$style .'" type="image" class="w3-round-large" name="photo"  id="photo"  src="'.$image .'" alt="'.$image .'" />'."<br /><br />";
    echo '</form>';
    echo '</div>';
}

?>
</div>

<div hidden="true" style="margin-top: 20px" class="w3-center" id="editPane">
<h2 class="w3-center" style="color: black"> Delete Images </h2>
<?php
$files = array_reverse(glob("/home/pi/Pictures/*.*"));

for ($i=0; $i<count($files); $i++) {
    $image = $files[$i];
    $style = "height:90%; width:90%; box-shadow: 0 4px 8px 3px rgba(0, 0, 0, 0.2);";
    $w3class = "w3-center";
    echo '<div id="'.$image .'" >';
    echo '<form action="deleteImage.php" method="get">';
    echo '<input hidden="true" type="text" name="name" value="'.$image .'">';
    echo '<input style="'.$style .'" type="image" name="photo"  id="photo"  src="'.$image .'" alt="Random image" />'."<br /><br />";
    echo '</form>';
    echo '</div>';
}

?>


<!-- Import scripts for Croppie and Initialize it-->
    <script src="croppie/jquery.min.js"></script>
    <script src="croppie/sweetalert.min.js"></script>
    <script src="croppie/croppie.js"></script>
    <script src="croppie/script.js"></script>
    <script src="croppie/exif.js"></script>
	<script>
        CropImage.init();
    </script>
<script>

	function openEdit(){
		document.getElementById("photoPane").style.display= "none";
		document.getElementById("editPane").style.display= "block";
		document.getElementById("changePeriodForm").style.display= "block";
		//document.getElementById("main2").classList.replace("w3-teal", "w3-red");
		//document.getElementById("uploadFORM").style.display= "none";
		//document.getElementById("fileUPLOAD").classList.replace("w3-teal", "w3-red");
		//document.getElementById("fileSUBMIT").classList.replace("w3-teal", "w3-red");
		document.getElementById("resetCAROUSEL").classList.replace("w3-teal", "w3-red");
		//document.getElementById("hideEditButton").style.display= "inline";
		document.getElementById("showEditButton").style.display= "none";
		document.getElementById("resetCarouselForm").style.display="none";
		//document.getElementById("periodSubmit").style.display="inline";
		document.getElementById("editButtonDiv").style.display="block";
		document.getElementById("uploadButtonsDiv").style.display="none";
	}


    function closeEdit(){
        document.getElementById("photoPane").style.display= "block";
        document.getElementById("editPane").style.display= "none";
        document.getElementById("changePeriodForm").style.display= "none";
       // document.getElementById("main2").classList.replace("w3-red", "w3-teal");
       // document.getElementById("uploadFORM").style.display= "inline";
      //  document.getElementById("fileUPLOAD").classList.replace("w3-red", "w3-teal");
       // document.getElementById("fileSUBMIT").classList.replace("w3-red", "w3-teal");
        document.getElementById("resetCAROUSEL").classList.replace("w3-red", "w3-teal");
        //document.getElementById("hideEditButton").style.display= "none";
        document.getElementById("showEditButton").style.display= "inline";
		document.getElementById("resetCarouselForm").style.display= "inline";
		//document.getElementById("periodSubmit").style.display="none";
		document.getElementById("editButtonDiv").style.display="none";
		document.getElementById("uploadButtonsDiv").style.display="block";

    }
	
	function croppieResultsLoading(){
		document.getElementById("croppieResultButton").style.display= "none";
		document.getElementById("croppieResultLoading").style.display= "inline-block";
		
	}
	


  (function(iOSDetection){
  
		// Really basic check for the ios platform
		// https://stackoverflow.com/questions/9038625/detect-if-device-is-ios
		var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
	  
		// Get the device pixel ratio
		var ratio = window.devicePixelRatio || 1;
	  
		// Define the users device screen dimensions
		var screen = {
		  width : window.screen.width * ratio,
		  height : window.screen.height * ratio
		};
	  
		// iPhone X Detection
		if (iOS && screen.width == 1125 && screen.height === 2436 && window.navigator.standalone == true) {
		  document.getElementById("navbarBackground").style.display = "block";
		  document.getElementById("navbar").classList.add("navv");
		} else if
		(iOS && screen.width == 1125 && screen.height === 2436 && window.navigator.standalone == true) {
		  document.getElementById("navbarBackground").style.display = "block";
		  document.getElementById("navbar").classList.add("navv");
		}
	})();

</script>



</body>
</html>



