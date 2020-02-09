sudo forever stopall
cd /home/pi/rpi-Canvas/support_frameworks/HAP-NodeJS
sudo forever start Core.js
sudo sh /var/www/html/pictureFrame.sh
