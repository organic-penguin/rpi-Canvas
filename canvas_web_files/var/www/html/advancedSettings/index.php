 <!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, user-scalable=no">
   	<meta name="apple-mobile-web-app-title" content="Canvas Advanced Settings">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	

     <title>Canvas Advanced Settings</title>

	 <style type="text/css">
	 
	 .navv{
		border-radius: 15px 15px 0px 0px;
	}
	 .switch {
	  position: relative;
	  display: inline-block;
	  width: 90px;
	  height: 34px;
	}

	.switch input {display:none;}

	.slider {
	  position: absolute;
	  cursor: pointer;
	  top: 0;
	  left: 0;
	  right: 0;
	  bottom: 0;
	  background-color: #ca2222;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	.slider:before {
	  position: absolute;
	  content: "";
	  height: 26px;
	  width: 26px;
	  left: 4px;
	  bottom: 4px;
	  background-color: white;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	input:checked + .slider {
	  background-color: #2ab934;
	}

	input:focus + .slider {
	  box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
	  -webkit-transform: translateX(55px);
	  -ms-transform: translateX(55px);
	  transform: translateX(55px);
	}

	/*------ ADDED CSS ---------*/
	.on
	{
	  display: none;
	}

	.on, .off
	{
	  color: white;
	  position: absolute;
	  transform: translate(-50%,-50%);
	  top: 50%;
	  left: 50%;
	  font-size: 10px;
	  font-family: Verdana, sans-serif;
	}

	input:checked+ .slider .on
	{display: block;}

	input:checked + .slider .off
	{display: none;}

	/*--------- END --------*/

	/* Rounded sliders */
	.slider.round {
	  border-radius: 34px;
	}

	.slider.round:before {
	  border-radius: 50%;}
     </style> 
	 
  </head>


  



<body style="background-color: #f2f2f2; -webkit-user-select: none; -webkit-touch-callout: none; line-height: 1;">
      <!-- Navbar -->
	  	<div id="navbarBackground"  class="w3-top" align="center" style="background-color: black;">Advanced Settings</div>
		<div id="navbar"  class="w3-top" align="center" style="padding: 5px; background-color: #456096; color:white; ">Advanced Settings</div>



<div id="uploadBAR" class="w3-center w3-round-large w3-card" style="padding-top: 10px; padding-bottom: 10px; background-color: #fcfcfc; margin-top:40px; margin-bottom: 10px; margin-left: 5px; margin-right: 5px; box-shadow: 0 4px 8px 3px rgba(0, 0, 0, 0.2);" >
	<form id="changePeriodForm" style="width: 95wv; " action="/changePeriod.php" method="GET" >
		Rotation Period:
		<input id="periodLength" class="w3-center w3-round-xlarge" style="width: 80wv; display: inline; " type="number" name="periodLength" id="periodLength">
	</form>
	<div>
		<button class="w3-button w3-round-xlarge" style="margin-top: 10px; color: white; background-color: #456096;" id="5MinButton" onClick="button5()">5 Min</button>
		<button class="w3-button w3-round-xlarge" style="margin-top: 10px; color: white; background-color: #456096;" id="10MinButton" onClick="button10()">10 Min</button>
		<button class="w3-button w3-round-xlarge" style="margin-top: 10px; color: white; background-color: #456096;" id="30MinButton" onClick="button30()">30 Min</button>
		<button class="w3-button w3-round-xlarge" style="margin-top: 10px; color: white; background-color: #456096;" id="1HRButton" onClick="button1HR()">1 HR</button>
	</div>
	<input id="periodSubmit" class="w3-button  w3-round-xlarge" style="margin-top:10px; color: white; background-color: #456096; display: inline" type="submit" form="changePeriodForm" value="Submit Change and Reset Canvas" name="submit">
	<form id="resetCarouselForm"style="text-align:center; display: inline" action="/restartViewer.php">	
	<input id="resetCAROUSEL" class="w3-button w3-round-xlarge" style="margin-top:10px; text-align:center; color: white; background-color: #456096;" type="submit" form="resetCarouselForm" value="Reset Carousel">	
	</form>
	
	<div style="column-count:2">
	<h2>Alexa: </h2> 
	<label style="margin-top:10px" class="switch"><input type="checkbox" onclick="enableSaveChange()" form="saveAdvancedSettingsForm" name="alexaToggle" id="alexaToggle"><div class="slider round"><!--ADDED HTML --><span class="on">ON</span><span class="off">OFF</span><!--END--></div></label>
	</div>
	<div style="column-count:2">
	<h2>Homekit:</h2>
	<label style="margin-top:10px" class="switch"><input type="checkbox" onclick="enableSaveChange()" form="saveAdvancedSettingsForm" name="homekitToggle" id="homekitToggle"><div class="slider round"><!--ADDED HTML --><span class="on">ON</span><span class="off">OFF</span><!--END--></div></label>
	</div>
	<form id="saveAdvancedSettingsForm" action="saveAdvancedSettings.php" method="GET" >
	</form>
	<button class="w3-button w3-round-xlarge" style="margin-top: 10px; color: white; background-color: #ca2222;" id="cancelAdvancedSettings" onClick="location.href='/'">Cancel</button>
	<input disabled class="w3-button w3-round-xlarge" onclick="saveAdvancedSettingsButton()" style="margin-top: 10px; color: white; background-color: #2ab934;" form="saveAdvancedSettingsForm" id="saveAdvancedSettings" type="submit" value="Save Changes">


	</div>
</div>

<script>
	function enableSaveChange(){
		document.getElementById("saveAdvancedSettings").disabled = false;
	}
	function saveAdvancedSettingsButton(){
		document.getElementById("saveAdvancedSettings").disabled = true;
		document.forms["saveAdvancedSettingsForm"].submit();
		alert("Settings are being saved (This may take a while)");
	}

		function button5(){
		document.getElementById("periodLength").value = '300';
	}
		function button10(){
		document.getElementById("periodLength").value = '600';
	}

		function button30(){
		document.getElementById("periodLength").value = '1800';
	}

		function button1HR(){
		document.getElementById("periodLength").value = '3600';
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
		if (iOS && screen.width == 1125 && screen.height === 2436 ) {
		  document.getElementById("navbarBackground").style.display = "block";
		  document.getElementById("navbar").classList.add("navv");
		} else if
		(iOS && screen.width == 1125 && screen.height === 2436 ) {
		  document.getElementById("navbarBackground").style.display = "block";
		  document.getElementById("navbar").classList.add("navv");
		}
	})();
</script>

</script>



</body>
</html>



