#!/bin/sh
#Assign variable names for JSON variables
TIMER="$(jq '.delay' /var/www/html/settings.json)"
ROTATINGSTATUS="$(jq -r '.rotating' /var/www/html/settings.json)"
TERMINAL="$(jq -r '.terminal' /var/www/html/settings.json)"

#kill all previous iterations of fbi
sudo killall fbi

#check if that settings currently have a static image or rotating carousel
if [ $ROTATINGSTATUS = true ]; then
	#If rotating execute fbi with interval based on the timer and terminal selected with all images as options
	sudo fbi -noverbose -m 640x480 -a -u -t $TIMER -T $TERMINAL /home/pi/Pictures/*
	echo $TIMER
	echo $TERMINAL
else
	#If static image, use fbi to display the image using the path saved in ROTATINGSTATUS
	echo "The value of the rotating status is" $ROTATINGSTATUS
	sudo fbi -noverbose -a -T $TERMINAL $ROTATINGSTATUS
	echo $TERMINAL
	echo Input received -$1- | wall
fi
