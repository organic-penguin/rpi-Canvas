cd /home/pi
sudo apt-get remove node nodejs nodejs-legacy -y
sudo apt-get install git-core libnss-mdns libavahi-compat-libdnssd-dev -y
if uname -m | grep -q "armv6l"; then
    clear
    echo "legacy Raspberry Pi detected"
    sleep 1
    cd /home/pi/rpi-Canvas/support_frameworks/node-v8.2.1-linux-armv6l/
    sudo cp -R * /usr/local/
else
    sudo curl -sL https://deb.nodesource.com/setup_8.x | sudo -E bash -
    sudo apt-get install nodejs -y
    sudo npm install -g n
    sudo rm /usr/local/bin/node
    sudo rm -rf /usr/local/lib/node_modules/npm
    sudo n prune
    sudo n 8.2.1
fi
sudo apt-get install gcc g++ make -y
sudo npm install -g node-gyp
cd /home/pi/rpi-Canvas/support_frameworks/HAP-NodeJS/
sudo npm install



