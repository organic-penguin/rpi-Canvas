IPADDRESS=$(echo $(hostname -I))
convert -pointsize 40 -fill white -draw "text 720,570 '$(echo $(hostname -I) '\n' $(hostname).local)' " /home/pi/rpi-Canvas/images/gettingCanvasStarted.png /home/pi/Pictures/gettingCanvasStarted.png
echo $IPADDRESS
