all: install_prerequisites

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
	sudo cp -f /home/pi/Canvas/config_files/etc/apache2/apache2.conf /etcsudo cp -f /home/pi/Canvas/config_files/etc/apache2/apache2.conf /etc/apache2/apache2.conf/apache2/apache2.conf
	sudo a2enmod userdir

install_Canvas:
	@echo "Copying Canvas' Apache operation files and scripts"
	sudo cp -r /home/pi/Canvas/canvas_web_files/var/www/html /var/www
	@echo "Make Pictures Directory"
	sudo mkdir /home/pi/Pictures
	@echo "Giving world permission to read and write"
	sudo chmod +666 /home/pi/Pictures
