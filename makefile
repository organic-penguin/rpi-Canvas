all: install_prerequisites apply_config_modifications install_Canvas install_homekit

install_prerequisites:
	@echo "Getting Updates"
	sudo apt-get update -y
	@echo "Install Apache, PHP, FBI, jq, and imagemagick"
	sudo apt-get install apache2 php fbi jq imagemagick -y

apply_config_modifications:
	@echo "Installing modifications to configuration files for Apache"
	sudo cp -f /home/pi/rpi-Canvas/config_files/etc/apache2/apache2.conf  /etc/apache2/
	sudo cp -f /home/pi/rpi-Canvas/config_files/etc/apache2/envvars /etc/apache2/
	sudo a2enmod userdir
	@echo "Restarting Apache2 Service"
	sudo service apache2 restart

install_Canvas:
	@echo "Copying Canvas' Apache operation files and scripts"
	sudo cp -r /home/pi/rpi-Canvas/canvas_web_files/var/www/html /var/www
	@echo "Giving world permission to read and write in Pictures and Canvas settings.json"
	sudo chmod +666 /home/pi/Pictures /var/www/html/settings.json
	@echo "Removing index.html for preference of index.php"
	sudo rm -f /var/www/html/index.html
	@echo "Adding execution priviliges to apache scripts"
	sudo chmod +777 /var/www/html/setImage.sh /var/www/html/pictureFrame.sh /var/www/html/deleteImage.sh
	sudo sh /home/pi/rpi-Canvas/gen_GettingStartedImage.sh

install_homekit:
	@echo "Installing Homekit"
	sudo apt-get remove node nodejs nodejs-legacy -y
	sudo apt-get install git-core libnss-mdns libavahi-compat-libdnssd-dev -y
	sudo cp -r /home/pi/rpi-Canvas/support_frameworks/node-v8.2.1-linux-armv6l/* /usr/local
	sudo apt-get install gcc g++ make -y
	sudo npm install -g node-gyp
	sudo npm install /home/pi/rpi-Canvas/support_frameworks/HAP-NodeJS/
	@echo "Installing NPM Forever"
	sudo npm install forever -g
	@echo "Installing sleep"
	sudo npm install --unsafe-perm -g sleep
