#!/bin/sh
TIMER="$(jq '.delay' /var/www/html/settings.json)"
ROTATINGSTATUS="$(jq -r '.rotating' /var/www/html/settings.json)"

sudo killall fbi

if [ $ROTATINGSTATUS = true ]; then
	sudo fbi -noverbose -m 640x480 -a -u -t $TIMER -T 2 /home/pi/Pictures/*
	echo $TIMER
else
	echo "The value of the rotating status is" $ROTATINGSTATUS
	sudo fbi -noverbose -a -T 2 $ROTATINGSTATUS
	echo Input received -$1- | wall
fi
