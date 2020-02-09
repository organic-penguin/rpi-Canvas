all: apply_config_modifications install_Canvas

install_prerequisites:
	@echo "Getting Updates"
	sudo apt-get update -y
	@echo "Install Apache"
	sudo apt-get install apache2 -y
	@echo "Installing PHP"
	sudo apt-get install php -y
	@echo "Installing FBI"
	sudo apt-get install fbi -y


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
	@echo "Giving world permission to read and write in Pictures"
	sudo chmod +666 /home/pi/Pictures
	@echo "Removing index.html for preference of index.php"
	sudo rm -f /var/www/html/index.html
	@echo "Adding execution priviliges to apache scripts"
	sudo chmod +777 /var/www/html/setImage.sh /var/www/html/pictureFrame.sh /var/www/html/deleteImage.sh 
